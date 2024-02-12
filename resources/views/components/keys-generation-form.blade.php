<form action="/keys-generation" method="POST">
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

  <input
    type="submit"
    value="Generate New Keys"
    class="btn btn-primary d-block w-100 mt-4"
  />
</form>
