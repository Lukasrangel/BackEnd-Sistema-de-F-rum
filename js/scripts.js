const initial_path = 'http://127.0.0.1/forum';

function deletaPost(id){
    elemento = document.querySelector('#post_'+id);
    let confirma = confirm('Tem certeza que deseja excluir este post?');
    if(confirma){
        fetch(initial_path + '/ajax/delete.php?post=' + id)
        .then(response =>response.json())
        .then(json => {
            if(json.sucesso){
                console.log(elemento)
                elemento.style.display = 'none';
            }
        })
    }
}

function editaPost(id){
    window.location = initial_path + '/edita?post=' + id;
}

function responderPost(id, slug){
    window.location = initial_path + '/'  + slug + '/responda?post=' + id;
}

//abre edição no my
var overflow = document.querySelector('.overflow');
var box = document.querySelector('.user-infos')

open = document.querySelector('.icon img');
open.addEventListener('click',()=>{
    overflow.style.display = 'block';
    box.classList.add('animate');
})


//fecha edição my
close = document.querySelector('.close')
close.addEventListener('click',()=>{
    overflow.style.display = 'none';
    box.classList.remove('animate');
})