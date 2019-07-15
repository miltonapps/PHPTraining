/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    $('button').click(function(e){
        var button_id =  $(e.currentTarget).prop('id');       

        var value = +$('#' + button_id.slice(0, -1) + '-counter').val();
        var button_classes = $(e.currentTarget).prop('class'); 
        if(button_classes.indexOf('up_count') !== -1){
            value = (value) + 1;            
        } else {
            value = (value) - 1;            
        }
        value = value < 0 ? 0 : value;
        $('#' + button_id.slice(0, -1) + '-counter').val(value);
    });  
    $('.counter').click(function(){
        $(this).focus().select();
    });
});

var SI_SYMBOL = ["", "k", "M", "G", "T", "P", "E"];

function abbreviateNumber(number){

    // what tier? (determines SI symbol)
    var tier = Math.log10(number) / 3 | 0;

    // if zero, we don't need a suffix
    if(tier == 0) return number;

    // get suffix and determine scale
    var suffix = SI_SYMBOL[tier];
    var scale = Math.pow(10, tier * 3);

    // scale the number
    var scaled = number / scale;

    // format number and add suffix
    return scaled.toFixed(1) + suffix;
}