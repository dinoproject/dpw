let quiz = () => {
    let nilai = 0;
    if (document.getElementById('q1-2').checked === true) nilai++;
    if (document.getElementById('q2-1').checked === true) nilai++;
    if (document.getElementById('q3-2').checked === true) nilai++;
    if (document.getElementById('q4-2').checked === true) nilai++;
    if (document.getElementById('q5-4').checked === true) nilai++;
    document.getElementById('shownilai').style.display = 'inline';
    document.getElementById('nilainya').innerHTML = nilai * 20;

}