import threading

# ...

def play_sound():
    engine.say('wake up wake up wake up wake up')
    engine.iterate()

# ...

def process_frame():
    global start_time
    while True:
        # ...
        if Eye_Rat < 0.20:
            if not is_playing_sound:
                is_playing_sound = True
                sound_thread = threading.Thread(target=play_sound)
                sound_thread.start()
        else:
            is_playing_sound = False

        # ...
