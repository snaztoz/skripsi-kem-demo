<div>
  <div class="row">
    <div class="col-3">
      <p class="m-0">🔒 Public Key</p>
    </div>
    <div class="col">
      <textarea
        class="form-control form-control-sm"
        rows="8"
        readonly
      >{{ $generationResult->publicKey }}</textarea>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-3">
      <p class="m-0">🔓 Private Key</p>
    </div>
    <div class="col">
      <textarea
        class="form-control form-control-sm"
        rows="8"
        readonly
      >{{ $generationResult->privateKey }}</textarea>
    </div>
  </div>
</div>
