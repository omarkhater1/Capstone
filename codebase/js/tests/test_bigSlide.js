const $ = require('jquery');
require('/bigSlide.js'); 

describe('bigSlide Plugin', () => {
  test('should initialize with default options', () => {
    const $ = require('jquery');
    require('./bigSlide.js');

    describe('bigSlide Plugin', () => {
      document.body.innerHTML = `
        <div id="menu"></div>
        <div class="push"></div>
        <button id="menuLink"></button>
      `;

      test('default options', () => {
        $('#menuLink').bigSlide();
        expect($('#menu').css('position')).toBe('fixed');
        expect($('#menu').css('top')).toBe('0px');
      });

      test('should toggle menu state', () => {
        const menuLink = $('#menuLink').bigSlide();
        menuLink.click();
        expect($('#menu').css('left')).not.toBe('-250px'); // Assuming default width
        menuLink.click();
        expect($('#menu').css('left')).toBe('-250px');
      });
  });
  });
});

