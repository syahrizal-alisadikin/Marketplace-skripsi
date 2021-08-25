<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <title>Hello, Skripsi!</title>
  </head>
  <body>
    <div class="container text-center pt-3">
      <h3>Mohon di isi ya temen-temen, Jawaban kalian sangat membantu</h3>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
          <form action="{{ route('form-kuisioner') }}" method="POST">
              @csrf
            <div class="my-3">
              <label for="formFile" class="form-label"><h5>Nama</h5></label>
              <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="inputPassword"
                placeholder="Masukan Nama"
              />
              @error('name')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"><h5>Email</h5></label>
              <input
                name="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="inputPassword"
                placeholder="Masukan Email"
              />
              @error('email')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>No Telephone</h5></label
              >
              <input
                name="phone"
                type="number"
                class="form-control @error('phone') is-invalid @enderror"
                id="inputPassword"
                placeholder="Masukan Phone"
              />
              @error('phone')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>Jenis Kelamain</h5></label
              >
              <select name="jk" class="form-select" id="">
                <option value="laki-laki" selected>Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>Usia saat ini ?</h5></label
              >
              <div class="form-check">
                <input
                  name="usia"
                  class="form-check-input"
                  type="radio"
                  value="15 - 20"
                  id="flexCheckDefault"
                  checked
                />
                <label class="form-check-label" for="flexCheckDefault">
                  15 - 20 Tahun
                </label>
              </div>
              <div class="form-check">
                <input
                  name="usia"
                  class="form-check-input"
                  type="radio"
                  value="21 - 26"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  21 - 26 tahun
                </label>
              </div>
              <div class="form-check">
                <input
                  name="usia"
                  class="form-check-input"
                  type="radio"
                  value="27 - 35"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  27 - 35 tahun
                </label>
              </div>
              <div class="form-check">
                <input
                  name="usia"
                  class="form-check-input"
                  type="radio"
                  value="36 - 45"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  36 - 45 tahun
                </label>
              </div>
              <div class="form-check">
                <input
                  name="usia"
                  class="form-check-input"
                  type="radio"
                  value="46 - 65"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  46 - 65 tahun
                </label>
              </div>
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>
                  Jika punya keinginan untuk membeli barang atau jasa yang di
                  butuhkan dimasa depan ?
                </h5></label
              >
              <div class="form-check">
                <input
                  name="membeli"
                  class="form-check-input"
                  type="radio"
                  value="Cash"
                  id="flexCheckChecked"
                  checked
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Membeli dengan cara Cash
                </label>
              </div>
              <div class="form-check">
                <input
                  name="membeli"
                  class="form-check-input"
                  type="radio"
                  value="Credit"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Membeli dengan cara Credit
                </label>
              </div>
              <div class="form-check">
                <input
                  name="membeli"
                  class="form-check-input"
                  type="radio"
                  value="Menabung"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Membeli dengan cara Menabung
                </label>
              </div>
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>
                  Bagaimana memutuskan untuk membeli barang/jasa dimasa depan ?
                </h5></label
              >
              <div class="form-check">
                <input
                  name="cara"
                  class="form-check-input"
                  type="radio"
                  value="dadakan"
                  id="flexCheckChecked"
                  checked
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Dadakan
                </label>
              </div>
              <div class="form-check">
                <input
                  name="cara"
                  class="form-check-input"
                  type="radio"
                  value="nanti"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Bagaimana Nanti aja
                </label>
              </div>
              <div class="form-check">
                <input
                  name="cara"
                  class="form-check-input"
                  type="radio"
                  value="direncanakan"
                  id="flexCheckChecked"
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Direncanakan
                </label>
              </div>
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>Barang / jasa yang diharapkan 1 - 6 Bulan ?</h5></label
              >
              <div class="form-check">
                <input
                  name="harapan1"
                  class="form-check-input"
                  type="checkbox"
                  value="Electronic/Gadget"
                  id="flexCheckDefault1"
                  checked
                />
                <label class="form-check-label" for="flexCheckDefault1">
                  Electronic/Gadget
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan2"
                  class="form-check-input"
                  type="checkbox"
                  value="Liburan"
                  id="flexCheckChecked2"
                />
                <label class="form-check-label" for="flexCheckChecked2">
                  Liburan
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan3"
                  class="form-check-input"
                  type="checkbox"
                  value="Kelahiran / Aqiqah"
                  id="flexCheckChecked3"
                />
                <label class="form-check-label" for="flexCheckChecked3">
                  Kelahiran / Aqiqah
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="flexCheckChecked4"
                  onclick="myFunction(this)"
                />
                <label class="form-check-label" for="flexCheckChecked4">
                  dan lain-lain
                </label>
                <input type="hidden" name="harapan4" id="harapan4" class="form-control" placeholder="Masukan Harapan Produk / jasa">
              </div>
            </div>
            <div class="my-3">
              <label for="formFile" class="form-label"
                ><h5>Barang / jasa yang diharapkan 7 - 12 Bulan ?</h5></label
              >
              <div class="form-check">
                <input
                  name="harapan7"
                  class="form-check-input"
                  type="checkbox"
                  value="Qurban"
                  id="flexCheckDefault7"
                  checked
                />
                <label class="form-check-label" for="flexCheckDefault7">
                  Qurban
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan8"
                  class="form-check-input"
                  type="checkbox"
                  value="Event / Nikah"
                  id="flexCheckChecked8"
                />
                <label class="form-check-label" for="flexCheckChecked8">
                  Event / Nikah
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan9"
                  class="form-check-input"
                  type="checkbox"
                  value="Liburan"
                  id="flexCheckChecked9"
                />
                <label class="form-check-label" for="flexCheckChecked9">
                  Liburan
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan10"
                  class="form-check-input"
                  type="checkbox"
                  value="Kendaraan Motor"
                  id="flexCheckChecked10"
                />
                <label class="form-check-label" for="flexCheckChecked10">
                  Kendaraan Motor
                </label>
              </div>
              <div class="form-check">
                <input
                  name="harapan11"
                  class="form-check-input"
                  type="checkbox"
                  value="Renovasi Rumah"
                  id="flexCheckChecked11"
                />
                <label class="form-check-label" for="flexCheckChecked11">
                  Renovasi Rumah
                </label>
              </div>
            </div>
            
                <button type="submit" class="btn btn-primary btn-block">Kirim data</button>
           
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script>
    //sweetalert for success or error message
    @if(session()->has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 50000,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 5000,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
  </script>
  <script>
      function myFunction(checkbox) {
          if (checkbox.checked)
            {
                      let lain = document.getElementById('harapan4').type = "text";
            }else{
                      let lain = document.getElementById('harapan4').type = "hidden";

            }
      }
  </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
