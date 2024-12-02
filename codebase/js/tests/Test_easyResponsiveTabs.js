const $ = require('jquery');
require('/easyResponsiveTabs.js');

describe('easyResponsiveTabs Plugin', () => {
  document.body.innerHTML = `
    <div id="tabs">
      <ul class="resp-tabs-list">
        <li>Tab 1</li>
        <li>Tab 2</li>
      </ul>
      <div class="resp-tabs-container">
        <div>Content 1</div>
        <div>Content 2</div>
      </div>
    </div>
  `;

  test('should initialize tabs', () => {
    $('#tabs').easyResponsiveTabs();
    expect($('#tabs').hasClass('resp-tabs')).toBe(true);
  });

  test('should activate the first tab by default', () => {
    $('#tabs').easyResponsiveTabs();
    expect($('.resp-tab-active').text()).toBe('Tab 1');
  });
});
