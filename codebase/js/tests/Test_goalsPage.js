describe('Goals Page', () => {
  document.body.innerHTML = `
    <div id="myWeightModal" style="display: none;">
      <div class="weight-modal-content"></div>
    </div>
  `;

  test('should open weight modal', () => {
    openWeightModal();
    expect(document.getElementById('myWeightModal').style.display).toBe('block');
  });

  test('should close weight modal', () => {
    closeWeightModal();
    expect(document.getElementById('myWeightModal').style.display).toBe('none');
  });
});
