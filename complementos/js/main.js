const buscar = document.querySelector('#buscar')
const buscando = document.querySelector('#buscando')

buscando.onclick = function () {
    buscaMusica(buscar.value);
    buscar.value ='';
}


function buscaMusica(valor) {
    var data = null;
    const div = document.querySelector('#buscou')
    div.innerHTML = `<img style='width:100%;'src='/complementos/img/loading.gif'/>`
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            localStorage.setItem('dados', this.responseText)           
            
            if(this.responseText){
                invocarMusica();
            }
        }
    });

    xhr.open("GET", `https://deezerdevs-deezer.p.rapidapi.com/search?q=${valor}`)

    xhr.send(data);

    function invocarMusica(){
        if (localStorage.getItem('dados') !== undefined) {
            let dados = localStorage.getItem('dados');
            let lista = JSON.parse(dados);
            let list = lista['data'];
            const divisao = document.querySelector('#buscou')
            divisao.innerHTML = ``;
            for (var x = 0; x < list.length; x++) {
                let div = document.createElement('div');
                div.innerHTML = `      
            <div class='caixa_music'>        
                <img src='${list[x].artist.picture_medium}'/>
                <h1> Artista: ${list[x].artist.name} </h1><br>
                <p> Musica: ${list[x].title} </p><br>
                <p><br> Rank:  ${list[x].rank}</p>
                <img class='right' src='${list[x].album.cover_medium}' />
                <h2>Album: ${list[x].album.title}</h2>
                <br>
                <audio controls>
                    <source src="${list[x].preview}" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>
            </div>
            `
                divisao.appendChild(div);
            }
        }
        localStorage.removeItem('dados');
    }
}

function limpar(){
    document.getElementById('senha_reset').value =''
}
