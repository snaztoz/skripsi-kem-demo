<form action="/encapsulation" method="POST">
  @csrf

  <div class="row">
    <div class="col-3">
      <p class="m-0">Private Key:</p>
    </div>
    <div class="col">
      <textarea class="form-control" name="private-key" placeholder="Drop your private key here..."></textarea>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-3">
      <p class="m-0">Ciphertext:</p>
    </div>
    <div class="col">
      <textarea class="form-control" name="ciphertext" placeholder="Drop your ciphertext here..."></textarea>
    </div>
  </div>

  <input
    type="button"
    value="Decapsulate"
    class="btn btn-primary d-block w-100 mt-4"
  />
</form>
