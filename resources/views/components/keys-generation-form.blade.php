<form id="form" action="/keys-generation" method="POST">
  @csrf

  <div class="row align-items-center">
    <div class="col-3">
      <p class="m-0">🏭 Algorithm</p>
    </div>
    <div class="col">
      <select
        name="algorithm"
        class="form-select"
        aria-label="Select algorithm"
      >
        <option value="kyber">Kyber</option>
        <option value="rsa">RSA</option>
      </select>
    </div>
  </div>

  <button id="form-submit-btn" class="btn btn-primary d-block w-100 mt-4" type="submit">
    Generate New Keys
  </button>

  @push('scripts')
    <script>
      document.querySelector('#form').addEventListener('submit', (e) => {
        const button = document.querySelector('#form-submit-btn');
        button.disabled = true;
        button.innerHTML =
          '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>' +
          '<span class="ms-2" role="status">Generating...</span>'
      });
    </script>
  @endpush
</form>
