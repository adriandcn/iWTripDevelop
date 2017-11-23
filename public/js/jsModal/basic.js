/*
 * SimpleModal Basic Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */


function callModal($servicio) {

    var $id = '.cls';
    $($id).modal();
    $(".simplemodal-wrap").LoadingOverlay("show");
    return false;
}

function callModalMap($servicio) {

    var $id = '.cls';
    $($id).modal();
    return false;
}


