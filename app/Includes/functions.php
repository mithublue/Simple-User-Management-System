<?php

function user_can( $module, $action = null ) {
    $caps = session()->get('caps');
    if ( !$action ) {
        if( isset( $caps[$module] ) ) {
            return true;
        } else {
            return false;
        }
    } else {
        if( isset( $caps[$module][$action] ) && $caps[$module][$action] == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    return false;
}

function app_notice( $notice ) {
    return response(view('admin.notice',[
        'notice' => $notice
    ]));
}