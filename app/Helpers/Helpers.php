<?php

function get_image_path($folder, $filename){
    return asset('images/' . $folder . '/' . $filename);
}