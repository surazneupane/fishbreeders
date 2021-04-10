@extends('layouts.main')

@section('content')

<section>
    <div class="container py-5">
        <h4>
            Aquarium Calculator
        </h4>
        <form action="#" id="calculator-cuboid">
            <h5 class="pt-4">
                For Cuboid Tank Volume
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
        <form action="#" id="calculator-cylinder">
            <h5 class="pt-4">
                For Cylinder Tank Volume
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="diameter" class="form-label">Tank Diameter (cm) </label>
                    <input type="number" name="diameter" id="diameter" class="form-control rounded-pill" placeholder="Tank Diameter">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="height-cy" class="form-label">Tank Height (cm) </label>
                    <input type="number" name="height-cy" id="height-cy" class="form-control rounded-pill" placeholder="Tank Height">
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center ">
                    <button class="btn btn-success rounded-pill m-1" type="submit">
                        Calculate
                    </button>
                    <button class="btn btn-warning rounded-pill m-1" type="reset">
                        Reset
                    </button>
                </div>


                <div class=" text-center py-3" id="result-cylinder">
                    <div class="text-uppercase text-success h4">
                        Result
                    </div>
                    <div class="h5">
                        <div class="my-2" id="result-cylinder-cubic"></div>
                        <div class="my-2" id="result-cylinder-liter"></div>
                        <div class="my-2" id="result-cylinder-ukgallons"></div>
                        <div class="my-2" id="result-cylinder-usgallons"></div>
                    </div>
                </div>
            </div>
        </form>

        <form action="#" id="calculator-sphere">
            <h5 class="pt-4">
                For Sphere Tank Volume
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="diameter-sp" class="form-label">Tank Diameter (cm) </label>
                    <input type="number" name="diameter-sp" id="diameter-sp" class="form-control rounded-pill" placeholder="Tank Radius">
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
                    <label for="liter-ch" class="form-label">Tank Liters (l) </label>
                    <input type="number" name="liter-ch" id="liter-ch" class="form-control rounded-pill" placeholder="Tank Liters">
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


        <div>
            <h5 class="pt-4">
                Temperature Conversion (auto)
            </h5>
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="fah" class="form-label">Fahrenheit (F) </label>
                    <input type="number" name="fah" id="fah" class="form-control rounded-pill" placeholder="Fahrenheit">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cel" class="form-label">Celsius (C) </label>
                    <input type="number" name="cel" id="cel" class="form-control rounded-pill" placeholder="Celsius">
                </div>
            </div>

        </div>

        <div>
            <h5 class="pt-4">
                Liter & Gallons Conversion (auto)
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lit" class="form-label">Liter (L) </label>
                    <input type="number" name="lit" id="lit" class="form-control rounded-pill" placeholder="Liter">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="galuk" class="form-label">Uk Gallons (C) </label>
                    <input type="number" name="galuk" id="galuk" class="form-control rounded-pill" placeholder="UK Gallons">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="galus" class="form-label">US Gallons (C) </label>
                    <input type="number" name="galus" id="galus" class="form-control rounded-pill" placeholder="US Gallons">
                </div>
            </div>
        </div>

        <div>
            <h5 class="pt-4">
                Length Conversion (auto)
            </h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="cm" class="form-label">Centimeters (cm) </label>
                    <input type="number" name="cm" id="cm" class="form-control rounded-pill" placeholder="Centimeters ">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="met" class="form-label">Meter (m) </label>
                    <input type="number" name="met" id="met" class="form-control rounded-pill" placeholder="Meter">
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="inc" class="form-label">Inches (ih) </label>
                    <input type="number" name="inc" id="inc" class="form-control rounded-pill" placeholder="Inches">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ft" class="form-label">Foot (ft) </label>
                    <input type="number" name="ft" id="ft" class="form-control rounded-pill" placeholder="Foot">
                </div>
            </div>
        </div>






    </div>
</section>

@endsection

@section('bottom')

<script>
    document.getElementById('result-cuboid').style.display = "none";
    document.getElementById('result-cylinder').style.display = "none";
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
        let d = document.forms['calculator-sphere']['diameter-sp'].value;

        let r = d / 2;

        let result = (4 * Math.PI * r * r * r) / 3;

        document.getElementById('result-sphere').style.display = "block";
        document.getElementById('result-sphere-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters";
        document.getElementById('result-sphere-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-sphere-ukgallons').textContent = parseFloat((result / 1000) / 4.546).toFixed(2) + " Uk Gallons";
        document.getElementById('result-sphere-usgallons').textContent = parseFloat((result / 1000) / 3.785).toFixed(2) + " Us Gallons";
    });

    document.forms['calculator-cylinder'].addEventListener('submit', (e) => {
        e.preventDefault();
        let d = document.forms['calculator-cylinder']['diameter'].value;
        let h = document.forms['calculator-cylinder']['height-cy'].value;

        let r = d / 2;

        let result = Math.PI * r * r * h;

        document.getElementById('result-cylinder').style.display = "block";
        document.getElementById('result-cylinder-cubic').textContent = parseFloat(result).toFixed(2) + " Cubic Centimeters";
        document.getElementById('result-cylinder-liter').textContent = parseFloat(result / 1000).toFixed(2) + " Liters";
        document.getElementById('result-cylinder-ukgallons').textContent = parseFloat((result / 1000) / 4.546).toFixed(2) + " Uk Gallons";
        document.getElementById('result-cylinder-usgallons').textContent = parseFloat((result / 1000) / 3.785).toFixed(2) + " Us Gallons";
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
                8.34 * parseFloat((form18['liter-ch'].value) / 4.546).toFixed(2) * form18.tempdrop.value * 0.2

            );
        (e =
            t <= 1500 ? '1/10 HP Chiller' : t >= 1501 && t <= 3500 ? '1/4 HP Chiller' : t >= 3501 && t <= 6e3 ? '1/2 HP Chiller' : t >= 6001 && t <= 12e3 ? '1 HP Chiller' : t >= 12001 && t <= 24e3 ? "2 HP Chiller" : isNaN(t) ? "Please enter numerical values..." : "Greater than 2 HP Chiller"), (document.getElementById("result-btu-output").textContent = "BTU's: " + t), (document.getElementById("result-chiller-output").textContent = "Chiller size needed in HP (horsepower) " + e);



    })

    document.getElementById('fah').addEventListener('keyup', function(e) {
        document.getElementById('cel').value = Math.round(((e.target.value - 32) / 1.8) * 100) / 100
    })
    document.getElementById('cel').addEventListener('keyup', function(e) {
        document.getElementById('fah').value = Math.round(100 * (1.8 * e.target.value + 32)) / 100
    })

    document.getElementById('galus').addEventListener('keyup', function(e) {
        document.getElementById('lit').value = parseFloat(e.target.value * 3.785).toFixed(2);
        document.getElementById('galuk').value = parseFloat(e.target.value / 1.201).toFixed(2);

    })
    document.getElementById('lit').addEventListener('keyup', function(e) {
        document.getElementById('galus').value = parseFloat(e.target.value / 3.785).toFixed(2);
        document.getElementById('galuk').value = parseFloat(e.target.value / 4.546).toFixed(2);
    })
    document.getElementById('galuk').addEventListener('keyup', function(e) {
        document.getElementById('galus').value = parseFloat(e.target.value * 1.201).toFixed(2);
        document.getElementById('lit').value = parseFloat(e.target.value * 4.546).toFixed(2);
    })

    document.getElementById('cm').addEventListener('keyup', function(e) {
        document.getElementById('met').value = e.target.value / 100
        document.getElementById('inc').value = parseFloat(e.target.value / 2.54).toFixed(2)
        document.getElementById('ft').value = parseFloat(e.target.value / 30.48).toFixed(2)
    })
    document.getElementById('met').addEventListener('keyup', function(e) {
        document.getElementById('cm').value = e.target.value * 100
        document.getElementById('inc').value = parseFloat(e.target.value * 39.37).toFixed(2)
        document.getElementById('ft').value = parseFloat(e.target.value * 3.281).toFixed(2)
    })
    document.getElementById('inc').addEventListener('keyup', function(e) {
        document.getElementById('cm').value = e.target.value * 2.54
        document.getElementById('met').value = parseFloat(e.target.value / 39.37).toFixed(2)
        document.getElementById('ft').value = parseFloat(e.target.value / 12).toFixed(2)
    })
    document.getElementById('ft').addEventListener('keyup', function(e) {
        document.getElementById('cm').value = e.target.value * 30.48
        document.getElementById('met').value = parseFloat(e.target.value / 3.281).toFixed(2)
        document.getElementById('inc').value = parseFloat(e.target.value * 12).toFixed(2)
    })

</script>

@endsection
