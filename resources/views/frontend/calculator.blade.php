@extends('layouts.main')

@section('content')

<section>
    <div class="container py-5">
        <h4>
            Aquarium Calculator
        </h4>
        <form action="#" id="calculator-cuboid">
            <h5 class="pt-4">
                For Cuboid Tank
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
                <div class=" text-center py-3" id="result-cuboid">
                    <div class="text-uppercase text-success h4">
                        Result
                    </div>
                    <div class="h5">
                        <div class="my-2" id="result-cuboid-cubic"></div>
                        <div class="my-2" id="result-cuboid-liter"></div>
                        <div class="my-2" id="result-cuboid-ukgallons"></div>
                        <div class="my-2" id="result-cuboid-usgallons"></div>
                    </div>
                </div>
            </div>
        </form>
        <form action="#" id="calculator-sphere">
            <h5 class="pt-4">
                For Sphere Tank
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


                <div class=" text-center py-3" id="result-sphere">
                    <div class="text-uppercase text-success h4">
                        Result
                    </div>
                    <div class="h5">
                        <div class="my-2" id="result-sphere-cubic"></div>
                        <div class="my-2" id="result-sphere-liter"></div>
                        <div class="my-2" id="result-sphere-ukgallons"></div>
                        <div class="my-2" id="result-sphere-usgallons"></div>
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
        document.getElementById('result-cuboid-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters"; 
        document.getElementById('result-cuboid-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-cuboid-ukgallons').textContent = parseFloat((result / 1000)/4.54).toFixed(2) + " Uk Gallons";
        document.getElementById('result-cuboid-usgallons').textContent = parseFloat((result / 1000)/3.78541).toFixed(2) + " Us Gallons";
    });



    document.forms['calculator-sphere'].addEventListener('submit', (e) => {
        e.preventDefault();
        let d = document.forms['calculator-sphere']['diameter'].value;

        let r = d/2;

        let result = (4 * Math.PI * r * r * r) / 3;

        document.getElementById('result-sphere').style.display = "block";
        document.getElementById('result-sphere-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters";
        document.getElementById('result-sphere-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-sphere-ukgallons').textContent = parseFloat((result / 1000)/4.54).toFixed(2) + " Uk Gallons";
        document.getElementById('result-sphere-usgallons').textContent = parseFloat((result / 1000)/3.78541).toFixed(2) + " Us Gallons";
    });



</script>

@endsection