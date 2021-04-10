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
            <div class=" py-4">
                <img src="https://uploads-cdn.omnicalculator.com/images/aquarium/box-calc.png" alt="" height="100">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="length" class="form-label">Tank Length (cm) </label>
                    <input type="number" name="length" id="length" class="form-control rounded-pill" placeholder="Tank Length">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="width" class="form-label">Tank Width (cm) </label>
                    <input type="number" name="width" id="width" class="form-control rounded-pill" placeholder="Tank Width">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="height" class="form-label">Tank Height / Depth (cm) </label>
                    <input type="number" name="height" id="height" class="form-control rounded-pill" placeholder="Tank Height / Depth">
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
                    <input type="number" name="diameter" id="diameter" class="form-control rounded-pill" placeholder="Tank Radius">
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

        <form action="#" id="calculator-heater">
            <h5 class="pt-4">
                Heater Size Calculator
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="liter" class="form-label">Tank Liters (l) </label>
                    <input type="number" name="liter" id="liter" class="form-control rounded-pill" placeholder="Tank Liters">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tempchange" class="form-label">Temperature Change <small>(tank temp minus room temp)</small> (C) </label>

                    <input type="number" name="tempchange" id="tempchange" class="form-control rounded-pill" placeholder="Tank Temperature Change">
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center ">
                    <button class="btn btn-success rounded-pill m-1" type="submit">
                        Calculate
                    </button>
                    <button class="btn btn-warning rounded-pill m-1" type="reset">
                        Reset
                    </button>
                </div>


                <div class=" text-center py-3" id="result-heater">
                    <div class="text-uppercase text-success h4">
                        Result
                    </div>
                    <div id="result-heater-output" class=" h5">

                    </div>
                </div>
            </div>
        </form>

        <form action="#" id="calculator-chiller">
            <h5 class="pt-4">
                Chiller Size Calculator
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="liter" class="form-label">Tank Liters (l) </label>
                    <input type="number" name="liter" id="liter" class="form-control rounded-pill" placeholder="Tank Liters">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tempdrop" class="form-label">Temperature Drop (C) </label>

                    <input type="number" name="tempdrop" id="tempdrop" class="form-control rounded-pill" placeholder="Tank Temperature Drop">
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center ">
                    <button class="btn btn-success rounded-pill m-1" type="submit">
                        Calculate
                    </button>
                    <button class="btn btn-warning rounded-pill m-1" type="reset">
                        Reset
                    </button>
                </div>


                <div class=" text-center py-3" id="result-chiller">
                    <div class="text-uppercase text-success h4">
                        Result
                    </div>
                    <div id="result-btu-output" class=" h5">

                    </div>
                    <div id="result-chiller-output" class=" h5">

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
    document.getElementById('result-heater').style.display = "none";
    document.getElementById('result-chiller').style.display = "none";


    document.forms['calculator-cuboid'].addEventListener('submit', (e) => {
        e.preventDefault();
        let l = document.forms['calculator-cuboid']['length'].value;
        let w = document.forms['calculator-cuboid']['width'].value;
        let h = document.forms['calculator-cuboid']['height'].value;

        let result = l * w * h;

        document.getElementById('result-cuboid').style.display = "block";
        document.getElementById('result-cuboid-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters";
        document.getElementById('result-cuboid-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-cuboid-ukgallons').textContent = parseFloat((result / 1000) / 4.54).toFixed(2) + " Uk Gallons";
        document.getElementById('result-cuboid-usgallons').textContent = parseFloat((result / 1000) / 3.78541).toFixed(2) + " Us Gallons";
    });

    document.forms['calculator-sphere'].addEventListener('submit', (e) => {
        e.preventDefault();
        let d = document.forms['calculator-sphere']['diameter'].value;

        let r = d / 2;

        let result = (4 * Math.PI * r * r * r) / 3;

        document.getElementById('result-sphere').style.display = "block";
        document.getElementById('result-sphere-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters";
        document.getElementById('result-sphere-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-sphere-ukgallons').textContent = parseFloat((result / 1000) / 4.546).toFixed(2) + " Uk Gallons";
        document.getElementById('result-sphere-usgallons').textContent = parseFloat((result / 1000) / 3.785).toFixed(2) + " Us Gallons";
    });

    document.forms['calculator-heater'].addEventListener('submit', (e) => {
        e.preventDefault();
        form17 = document.forms['calculator-heater'];
        var e = "";
        document.getElementById('result-heater').style.display = "block";
        parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 5 ? form17.tempchange.value <= 5 ? (e = '25 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '50 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '75 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 5.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 10 ? form17.tempchange.value <= 5 ? (e = '50 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '75 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '75 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 10.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 20 ? form17.tempchange.value <= 5 ? (e = '50 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '75 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '150 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 20.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 25 ? form17.tempchange.value <= 5 ? (e = '75 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '100 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '200 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 25.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 40 ? form17.tempchange.value <= 5 ? (e = '100 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '150 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '300 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 40.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 50 ? form17.tempchange.value <= 5 ? (e = '150 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '200 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '2 x 200 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 50.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 65 ? form17.tempchange.value <= 5 ? (e = '200 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '250 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '2 x 250 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 65.1 && parseFloat((form17.liter.value) / 4.546).toFixed(2) <= 75 ? form17.tempchange.value <= 5 ? (e = '250 Watts ') : form17.tempchange.value >= 5.1 &&
            form17.tempchange.value <= 10 ? (e = '300 Watts ') : form17.tempchange.value >= 10.1 &&
            (e =
                '2 x 300 Watts ') :
            parseFloat((form17.liter.value) / 4.546).toFixed(2) >= 75.1 &&
            (e =
                'multiple 300 Watts ')
            , (document.getElementById("result-heater-output").textContent = "Heater(s) size needed: " + e);

    });

    document.forms['calculator-chiller'].addEventListener('submit', (e) => {

        e.preventDefault();
        const form18 = document.forms['calculator-chiller']
        document.getElementById('result-chiller').style.display = "block";


        var e
            , t = Math.ceil(
                8.34 * form18.liter.value * form18.tempdrop.value * 0.2
            );
        (e =
            t <= 1500 ? '1/10 HP Chiller' : t >= 1501 && t <= 3500 ? '1/4 HP Chiller' : t >= 3501 && t <= 6e3 ? '1/2 HP Chiller' : t >= 6001 && t <= 12e3 ? '1 HP Chiller' : t >= 12001 && t <= 24e3 ? "2 HP Chiller" : isNaN(t) ? "Please enter numerical values..." : "Greater than 2 HP Chiller"), (document.getElementById("result-btu-output").textContent = "BTU's: " + t), (document.getElementById("result-chiller-output").textContent = "Chiller size needed in HP (horsepower) " + e);



    })

</script>

@endsection
