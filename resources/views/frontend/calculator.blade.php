@extends('layouts.main')

@section('content')

<section>
    <div class="container py-5">
        <h4>
            Aquarium Calculator
        </h4>
        <form action="#" id="calculator-cuboid">
            <h5 class="pt-4">
                For Cuboid
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="length" class="form-label">Tank Length (cm) </label>
                    <input type="number" name="length" id="length" class="form-control rounded-pill"
                        placeholder="Tank Length">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="width" class="form-label">Tank Width (cm) </label>
                    <input type="number" name="width" id="width" class="form-control rounded-pill"
                        placeholder="Tank Width">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="height" class="form-label">Tank Height / Depth (cm) </label>
                    <input type="number" name="height" id="height" class="form-control rounded-pill"
                        placeholder="Tank Height / Depth">
                </div>
                <div class="d-flex justify-content-center align-items-center ">
                    <button class="btn btn-success rounded-pill m-1" type="submit">
                        Calculate
                    </button>
                    <button class="btn btn-warning rounded-pill m-1" type="reset">
                        Reset
                    </button>
                </div>
                <div class="">
                    <div class="h3 text-center py-3" id="result-cuboid">
                        <div class="text-uppercase text-success">
                            Result
                        </div>
                        <span id="result-cuboid-cubic"></span> cubic centimeters <br> <span
                            id="result-cuboid-liter"></span> Liters
                    </div>
                </div>
            </div>
        </form>
        <form action="#" id="calculator-sphere">
            <h5 class="pt-4">
                For Sphere
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="diameter" class="form-label">Tank Diameter (cm) </label>
                    <input type="number" name="diameter" id="diameter" class="form-control rounded-pill"
                        placeholder="Tank Radius">
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center ">
                    <button class="btn btn-success rounded-pill m-1" type="submit">
                        Calculate
                    </button>
                    <button class="btn btn-warning rounded-pill m-1" type="reset">
                        Reset
                    </button>
                </div>
                <div class="">
                    <div class="h3 text-center py-3" id="result-sphere">
                        <div class="text-uppercase text-success">
                            Result
                        </div>
                        <span id="result-sphere-cubic"></span> cubic centimeters <br> <span
                            id="result-sphere-liter"></span> Liters
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@section('bottom')

<script>
    document.getElementById('result-cuboid').style.display = "none";
    document.getElementById('result-sphere').style.display = "none";


    document.forms['calculator-cuboid'].addEventListener('submit', (e) => {
        e.preventDefault();
        let l = document.forms['calculator-cuboid']['length'].value;
        let w = document.forms['calculator-cuboid']['width'].value;
        let h = document.forms['calculator-cuboid']['height'].value;

        let result = l * w * h;

        document.getElementById('result-cuboid').style.display = "block";
        document.getElementById('result-cuboid-cubic').textContent = parseFloat(result).toFixed(2);
        document.getElementById('result-cuboid-liter').textContent = parseFloat(result / 1000).toFixed(2);
    });



    document.forms['calculator-sphere'].addEventListener('submit', (e) => {
        e.preventDefault();
        let d = document.forms['calculator-sphere']['diameter'].value;

        let r = d/2;

        let result = (4 * Math.PI * r * r * r) / 3;

        document.getElementById('result-sphere').style.display = "block";
        document.getElementById('result-sphere-cubic').textContent = parseFloat(result).toFixed(2);
        document.getElementById('result-sphere-liter').textContent = parseFloat(result / 1000).toFixed(2);
    });



</script>

@endsection