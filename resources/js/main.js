import "bootstrap";

function calculateAmmonia() {
    var e = document.form20.aquariumVolume.value,
        t = form20.desiredAmmoniaLevel.value - form20.currentAmmoniaLevel.value,
        r = (266 * form20.ammoniaStrength.value) / 100;
    (result = Math.round(((t * e) / r) * 100) / 100),
        (result2 = Math.floor(20 * result)),
        isFinite(result) &&
            isFinite(result2) &&
            ((document.form20.result.value = result),
            (document.form20.result2.value = result2));
}
function convertFtoC() {
    (result =
        Math.round(((document.form1.temperature.value - 32) / 1.8) * 100) /
        100),
        (document.form1.result.value = result);
}

function convertCtoF() {
    (result =
        Math.round(100 * (1.8 * document.form2.temperature.value + 32)) / 100),
        (document.form2.result.value = result);
}
function convertGtoL() {
    (result = Math.round(3.785 * document.form3.gallons.value * 100) / 100),
        (document.form3.result.value = result);
}

function convertLtoG() {
    (result = Math.round((document.form4.liters.value / 3.785) * 100) / 100),
        (document.form4.result.value = result);
}
function convertItoC() {
    (result = Math.round(2.54 * document.form5.inches.value * 100) / 100),
        (document.form5.result.value = result);
}
function convertCtoI() {
    (result = Math.round((document.form6.CM.value / 2.54) * 100) / 100),
        (document.form6.result.value = result);
}
function computeGallons() {
    (result =
        Math.round(
            ((document.form7.LT.value *
                document.form7.WT.value *
                document.form7.HT.value) /
                231) *
                100
        ) / 100),
        (document.form7.result.value = Math.round(100 * result) / 100),
        (document.form7.result2.value = Math.round(0.833 * result * 100) / 100);
}
function computeUSGallons() {
    (result = Math.round(1.201 * document.form8.UKGallons.value * 100) / 100),
        (document.form8.result.value = result);
}
function computeUKGallons() {
    (result = Math.round(0.833 * document.form9.USGallons.value * 100) / 100),
        (document.form9.result.value = result);
}
function convertMtoF() {
    (result = Math.round(3.28 * document.form10.Meters.value * 100) / 100),
        (document.form10.result.value = result);
}
function convertFtoM() {
    (result = Math.round(0.3048 * document.form11.Feet.value * 100) / 100),
        (document.form11.result.value = result);
}
function convertMeqtoDKH() {
    (result = Math.round(2.8 * document.form12.meq.value * 100) / 100),
        (resultppm = Math.round(50 * document.form12.meq.value * 100) / 100),
        (document.form12.result.value = result),
        (document.form12.resultppm.value = resultppm);
}
function convertDKHtoMeq() {
    (result = Math.round((document.form13.dkh.value / 2.8) * 100) / 100),
        (resultppm = Math.round(50 * result * 100) / 100),
        (document.form13.result.value = result),
        (document.form13.resultppm.value = resultppm);
}
function convertCACO() {
    (result = Math.round((document.form16.caco.value / 50) * 100) / 100),
        (resultdkh = Math.round(2.8 * result * 100) / 100),
        (document.form16.result.value = result),
        (document.form16.resultdkh.value = resultdkh);
}
function convertCylinder() {
    var e = form14.radius.value,
        t = 3.1417 * e * e * form14.height.value;
    (result = Math.round((t / 231) * 100) / 100),
        (result2 = Math.round(0.833 * result * 100) / 100),
        (result3 = Math.round(3.785 * result * 100) / 100),
        (document.form14.result.value = result),
        (document.form14.result2.value = result2),
        (document.form14.result3.value = result3);
}
function convertHexagon() {
    var e =
        ((3 * Math.sqrt(3)) / 2) *
        Math.pow(form15.sidelength.value, 2) *
        form15.height.value;
    (result = Math.round((e / 231) * 100) / 100),
        (result2 = Math.round(0.833 * result * 100) / 100),
        (result3 = Math.round(3.785 * result * 100) / 100),
        (document.form15.result.value = result),
        (document.form15.result2.value = result2),
        (document.form15.result3.value = result3);
}
var result = 0,
    roundLength = 2;
function calculateHeaterSize() {
    var e = "";
    form17.gallons.value <= 5
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/25watt">25 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/50watt">50 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/75watt">75 watts</a>')
        : form17.gallons.value >= 5.1 && form17.gallons.value <= 10
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/50watt">50 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/75watt">75 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/75watt">75 watts</a>')
        : form17.gallons.value >= 10.1 && form17.gallons.value <= 20
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/50watt">50 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/75watt">75 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/150watt">150 watts</a>')
        : form17.gallons.value >= 20.1 && form17.gallons.value <= 25
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/75watt">75 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/100watt">100 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/200watt">200 watts</a>')
        : form17.gallons.value >= 25.1 && form17.gallons.value <= 40
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/100watt">100 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/150watt">150 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/300watt">300 watts</a>')
        : form17.gallons.value >= 40.1 && form17.gallons.value <= 50
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/150watt">150 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/200watt">200 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/200watt">2 x 200 watts</a>')
        : form17.gallons.value >= 50.1 && form17.gallons.value <= 65
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/200watt">200 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/250watt">250 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/250watt">2 x 250 watts</a>')
        : form17.gallons.value >= 65.1 && form17.gallons.value <= 75
        ? form17.tempchangerequired.value <= 5
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/250watt">250 watts</a>')
            : form17.tempchangerequired.value >= 5.1 &&
              form17.tempchangerequired.value <= 10
            ? (e =
                  '<a href="https://www.fishlore.com/amazon/300watt">300 watts</a>')
            : form17.tempchangerequired.value >= 10.1 &&
              (e =
                  '<a href="https://www.fishlore.com/amazon/300watt">2 x 300 watts</a>')
        : form17.gallons.value >= 75.1 &&
          (e =
              '<a href="https://www.fishlore.com/amazon/300watt">multiple 300 watts</a>'),
        (document.getElementById("heatersizeresult").innerHTML = e);
}
<functi></functi>on calculateChillerSize() {
    var e,
        t = Math.ceil(
            8.34 * form18.gallons.value * form18.tempdropneeded.value * 0.2
        );
    (e =
        t <= 1500
            ? '<a href="https://www.fishlore.com/amazon/onetenthhpchiller">1/10 HP Chiller</a>'
            : t >= 1501 && t <= 3500
            ? '<a href="https://www.fishlore.com/amazon/onequarterhpchiller">1/4 HP Chiller</a>'
            : t >= 3501 && t <= 6e3
            ? '<a href="https://www.fishlore.com/amazon/onehalfhpchiller">1/2 HP Chiller</a>'
            : t >= 6001 && t <= 12e3
            ? '<a href="https://www.fishlore.com/amazon/onehpchiller">1 HP Chiller</a>'
            : t >= 12001 && t <= 24e3
            ? "2 HP Chiller"
            : isNaN(t)
            ? "Please enter numerical values..."
            : "Greater than 2 HP Chiller"),
        (document.getElementById("totalbtus").innerHTML = t),
        (document.getElementById("chillersizeresult").innerHTML = e);
}
