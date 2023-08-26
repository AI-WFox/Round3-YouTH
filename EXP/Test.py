import cv2
import dlib
import pyttsx3
from scipy.spatial import distance
from flask import Flask, render_template, Response
import time
import threading

print("ok")


app = Flask(__name__)


def playsound1():
    # Khởi tạo pyttsx3 để phát âm thanh cảnh báo
    engine = pyttsx3.init()

    # Thiết lập vòng lặp phát âm thanh
    engine.startLoop(False)

    engine.say('wake up wake up wake up wake up')
    engine.iterate()
    
    # Dừng tiến trình xử lý và ngừng lặp lại
    engine.stop()
    engine.endLoop()

    # Đóng engine
    engine.stop()

def playsound2():
    # Khởi tạo pyttsx3 để phát âm thanh cảnh báo
    engine = pyttsx3.init()

    # Thiết lập vòng lặp phát âm thanh
    engine.startLoop(False)

    engine.say('You have been driving for 2 hours. Take a rest!')
    engine.iterate()
    
    # Dừng tiến trình xử lý và ngừng lặp lại
    engine.stop()
    engine.endLoop()

    # Đóng engine
    engine.stop()


# Cấu hình camera (bạn có thể chọn 0 thay vì 1)
cap = cv2.VideoCapture(0)

# Nhận dạng khuôn mặt và tìm góc nhìn để nhận diện mắt
face_detector = dlib.get_frontal_face_detector()

# Đường dẫn đến file .dat (file để nhận diện điểm trên khuôn mặt)
dlib_facelandmark = dlib.shape_predictor("/EXP/shape_predictor_68_face_landmarks.dat")

start_time = time.time()  # Thời điểm bắt đầu

def Detect_Eye(eye):
    poi_A = distance.euclidean(eye[1], eye[5])
    poi_B = distance.euclidean(eye[2], eye[4])
    poi_C = distance.euclidean(eye[0], eye[3])
    aspect_ratio_Eye = (poi_A + poi_B) / (2 * poi_C)
    return aspect_ratio_Eye
def process_frame():
    global start_time  # Để có thể cập nhật biến bên trong hàm
    while True:
        current_time = time.time()
        elapsed_time = current_time - start_time

        _, frame = cap.read()
        gray_scale = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

        if elapsed_time >= 30:  # 7200 giây = 2 giờ
            cv2.putText(frame, "Eyes on the road and signs.", (15, 250),
                        cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 255), 2)
            sound_thread = threading.Thread(target=playsound2)
            sound_thread.start()
            start_time = current_time  # Cập nhật thời điểm bắt đầu

        faces = face_detector(gray_scale)
        for face in faces:
            face_landmarks = dlib_facelandmark(gray_scale, face)
            leftEye = []
            rightEye = []

            # Điểm phân phối cho mắt trái trong file .dat là từ 42 đến 47
            for n in range(42, 48):
                x = face_landmarks.part(n).x
                y = face_landmarks.part(n).y
                rightEye.append((x, y))
                next_point = n + 1
                if n == 47:
                    next_point = 42
                x2 = face_landmarks.part(next_point).x
                y2 = face_landmarks.part(next_point).y
                cv2.line(frame, (x, y), (x2, y2), (0, 255, 0), 1)

            # Điểm phân phối cho mắt phải trong file .dat là từ 36 đến 41
            for n in range(36, 42):
                x = face_landmarks.part(n).x
                y = face_landmarks.part(n).y
                leftEye.append((x, y))
                next_point = n + 1
                if n == 41:
                    next_point = 36
                x2 = face_landmarks.part(next_point).x
                y2 = face_landmarks.part(next_point).y
                cv2.line(frame, (x, y), (x2, y2), (255, 255, 0), 1)

            right_Eye = Detect_Eye(rightEye)
            left_Eye = Detect_Eye(leftEye)
            Eye_Rat = (left_Eye + right_Eye) / 2
            Eye_Rat = round(Eye_Rat, 2)

            cv2.putText(frame, "Eye Ratio: {}".format(Eye_Rat), (10, 30),
                        cv2.FONT_HERSHEY_SIMPLEX, 0.7, (0, 0, 255), 2)

            if Eye_Rat < 0.20:
                cv2.putText(frame, "Hey, you are sleeping", (15, 250),
                            cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 255), 2)
                cv2.putText(frame, "Wake up, deadline is coming", (10, 450),
                            cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 255), 2)
                sound_thread = threading.Thread(target=playsound1)
                sound_thread.start()
        _, jpeg = cv2.imencode('.jpg', frame)
        frame_data = jpeg.tobytes()

        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame_data + b'\r\n')


@app.route('/')
def home():
    return render_template('fe_home.html')

@app.route('/main')
def main():
    return render_template('fe_main.html')


@app.route('/video_feed')
def video_feed():
    return Response(process_frame(), mimetype='multipart/x-mixed-replace; boundary=frame')


if __name__ == '__main__':
    app.run(debug=True)
