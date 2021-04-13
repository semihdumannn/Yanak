/*=========================================================================================
    File Name: drag-drop.js
    Description: drag & drop elements using dragula js
    --------------------------------------------------------------------------------------
    Item name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {

    // Draggable Cards
    dragula([document.getElementById('card-drag-area')]);

    // Sortable Lists


// forEach method from https://toddmotto.com/ditch-the-array-foreach-call-nodelist-hack/
    var nodeListForEach = function (array, callback, scope) {
        for (var i = 0; i < array.length; i++) {
            callback.call(scope, i, array[i]);
        }
    };


    dragula([document.getElementById('basic-list-group2')]);

    dragula([document.getElementById('multiple-list-group-a'), document.getElementById('multiple-list-group-b')]);

    // Cloning
    dragula([document.getElementById('chips-list-1'), document.getElementById('chips-list-2')], {
        copy: true
    });

    // With Handles

    dragula([document.getElementById("handle-list-1"), document.getElementById("handle-list-2")], {
        moves: function (el, container, handle) {
            return handle.classList.contains('handle');
        }
    });

});
