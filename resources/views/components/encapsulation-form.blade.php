<form action="/encapsulation" method="POST">
  @csrf

  <div class="row">
    <div class="col-3">
      <p class="m-0">Public Key:</p>
    </div>
    <div class="col">
      <textarea class="form-control" name="public-key" placeholder="Drop your public key here..."></textarea>
    </div>
  </div>

  <div class="row align-items-center mt-3">
    <div class="col-3">
      <p class="m-0">Encoding:</p>
    </div>
    <div class="col">
      <select
        name="encoding"
        class="form-select"
        aria-label="Select encoding"
      >
        <option value="base64">Base64</option>
        <option value="dna">DNA</option>
      </select>
    </div>
  </div>

  <input
    type="button"
    value="Create New Encapsulation"
    class="btn btn-primary d-block w-100 mt-4"
  />
</form>
