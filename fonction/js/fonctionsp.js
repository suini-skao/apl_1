var files1 //stock les info de la variable file du fichiertitre
var files2//pour les video
var files3 //pour les images
function con_eur(a) // cas d'erreur de connection
{
    if(a=="active")
    {
    document.querySelector('#info').textContent="login ou mot de passe incorrecte"
    }
}
function con_eur2(a) // cas d'erreur de connection
{
    if(a=="active")
    {
    document.querySelector('#info').textContent="Compte Bloqué , veillez joindre l'administrateur"
    }
}
function ident(b)
{
    if(b=="active")//cas nom d'utilisateur déja utilisé
    {

    document.querySelector("#info2").textContent="Login déja utiliser"
    }
    if(b=="active2"){//cas mot de passe fait
    document.querySelector("#info2").textContent="Mot de passe trop court"
    }
    if(b=="active3"){//cas mot de passe fait
        document.querySelector("#info2").textContent="Veiller accepter les conditions"
        }
}
function motinc(a)// les deux mot de pase ne concorde pas
{
    if(a=="active")
    {
        document.querySelector("#erinfo").textContent="Les mots de passe ne sont pas identiques"
    }
}
function conect(a,b,direction) // verification login et mot de passe
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        })
    $(document).ready(function(){
        $(b).click(function(){
            $.post(//rdv
                    'fonction/php/login.php', 
                       {
                    logine : $("#login-email").val(),
                    loginp : $("#login-password").val()
                    
                        },
                    function(data){
                    
                        if(data=="bug")
                        {
                            con_eur("active")
                        }
                        if(data=="bug2")
                        {
                            con_eur2("active")
                        }
                        if(data=="marche")
                        {
                            document.location.href=direction
                        }
                    },
                    'text'
                    );
           
        });
        
    });
}
function enregist(a,b,direction)
{

    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        })
    $(document).ready(function(){
        $(b).click(function(){
            
            $.post(//rdv
                    'fonction/php/login.php', 
                       {
                    nom : $("#full-name").val(),
                    mail : $("#register-email").val(),
                    motd : $("#register-password").val(),
                   
                    
                        },
                    function(data){
                    
                        if(data=="bugs")
                        {
                            ident("active")
                        }
                        if(data=="court")
                        {
                            ident("active2")
                        }
                        if(data=="ved")
                        {
                            ident("active3")
                        }
                        if(data=="passe")
                        {
                            document.location.href=direction
                        }
                    },
                    'text'
                    );
           
        });
        
    });
}
function verifvide(a) // vérifie si une variable est vide pour les cochages
{
    if(a=="on")
    {
        return "oui"
    }
    else { return "non"}
}

function newh1()//formulaire d'insertion type 1
{
    $(document).ready(function(){
            $.post(//rdv ok
                    'fonction/php/insersp.php?files&infog', 
                       {
                    
                    titre:$("#property-title").val(),
                    descipt:$("#property-description").val(),
                    typappart:$("#select-type").val(),
                    status:$("#select-status").val(),
                    chambres:$("Bedrooms").val(),
                    douches:$("#Bathrooms").val(),
                    escalier:$("#Floors").val(),
                    garages:$("#Garages").val(),
                    surface:$("#Area").val(),
                    prix:$("#Sale-Rent-Price").val(),
                    prixd:$("#Before-Price-Label").val(),
                    prixr:$("#After-Price-Label").val(),
                    cni:$("#Property-ID").val(),
                    piece:$("#Pieces").val()
                        },
                    'text'
                    );
           
    });
 } 
 function prefere()//formulaire d'insertion preference
{
    $(document).ready(function(){
            $.post(//rdv ok
                    'fonction/php/insersp.php?files&prefe', 
                       {
                    idmaison:$("#idmais").val(),
                    balcon:verifvide($("#bal").val()),
                    animaux:verifvide($("#pa2").val()),
                    barbeque:verifvide($("#pa3").val()),
                    alarm:verifvide($("#pa4").val()),
                    cuisine:verifvide($("#pa5").val()),
                    sauna:verifvide($("#pa6").val()),
                    gym:verifvide($("#pa7").val()),
                    ascenceur:verifvide($("#acs").val()),
                    sortiu:verifvide($("#pa9").val())
                        },
                    'text'
                    );
           
    });
 }
 function adress()//formulaire d'insertion preference
{
    $(document).ready(function(){
      
            $.post(//rdv addinfo($idm,$adrs,$vil,$quart,$vois,$bdd) ok
                    'fonction/php/insersp.php?files&addr', 
                       {
                    idmaison:$("#idmais").val(),
                    adrs:$("#address").val(),
                    vil:$("#select-status").val(),
                    quart:$("#state").val(),
                    vois:$("#neighborhood").val()
                    
                        },
                    'text'
                    );
           
    });
 }

 function imagep(b,event,info)// envoi images
 {
    $form=$(event.taget);
    var formdata3=$form.serialize();
    $.each(info.files3, function(key, value)
    {
        formdata3 = formdata3 + '&imgnames[]=' + value;
    });
        formData3=formData3+'&idmaison='+b;
    $(document).ready(function(){
                    $.ajax({
                        url: 'fonction/php/insersp.php?files&img',
                        type: 'POST',
                        data: formData3,
                        cache: false,
                        dataType: 'json',
                    });
           

    });
 }
 function imagep()// envoi images
 {
    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            let filed= new FormData(this);
            $.ajax({
                    url:'fonction/php/img_trait.php?files&img',
                    type:'post',
                    processData:false,
                    contentType:false,
                    data: filed,
                    dataType:'json'
    
    
            })
            alert('okju');
        })

    
    }) }
 function video(b,c)//envoi video
 {
    $(document).ready(function(){   //revoir les bld
                    formData2 = 'idmaison'+b+'&Video=' + c;
            $.ajax({
                        url: 'fonction/php/insersp.php?files&video',
                        type: 'POST',
                        data: formData2,
                        cache: false,
                        dataType: 'json',
                    });

    });

 }
 function filevf(b)//envois de files
 {
    $(document).ready(function(){
        var file=document.getElementById("#filesp");
        formData1 = 'idmaison='+b+'&file[]='+file;
        alert(file)
        $.ajax({
                    url: 'fonction/php/insersp.php?files&fichier',
                    type: 'POST',
                    data: formData1,
                    cache: false,
                    dataType: 'json',
                });
    });
 }
 function Addregroup(a,m,b)//envoi complete des informations b pour idmaison, a pour l'event
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
    })
        $(m).click(function(){
    alert("encours de chargement");
   
    $.post(//rdv
        'fonction/php/insersp.php?lol', //verification de la validité 
           {
        info: "ok=lol"
            },
        function(data){
        
            if(data=="autorisation")
            {
                alert("en cours 2")
                //newh1(b)//ok     
                imagep()
                //prefere(b)//ok
                //adress(b)//ok
                //alert("Votre demande a été prise en compte")
            }
        },
        'text'
        );
    });
    
}
function Addregroup1(a,m)//envoi complete des informations b pour idmaison, a pour l'event
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
    })
        $(m).click(function(){
  
   
    $.post(//rdv
        'fonction/php/insersp.php?lol', //verification de la validité 
           {
        info: "ok=lol"
            },
        function(data){
        
            if(data=="autorisation")
            {
                 newh1()
                 document.location.href="add-property2.php";
            }
        },
        'text'
        );
    });
    
}
function Addregroup2(a,m)//envoi complete des informations b pour idmaison, a pour l'event
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
    })
        $(m).click(function(){
    
   
    $.post(//rdv
        'fonction/php/insersp.php?lol', //verification de la validité 
           {
        info: "ok=lol"
            },
        function(data){
        
            if(data=="autorisation")
            {
                 prefere(),
                 adress()
                 document.location.href="add-property3.php";
            }
        },
        'text'
        );
    });
    
}
function Addregroup3(a)//envoi complete des informations b pour idmaison, a pour l'event
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        let filed= new FormData(this);
                        $.ajax({
                                url:'fonction/php/img_trait.php?files&img',
                                type:'post',
                                processData:false,
                                contentType:false,
                                data: filed,
                                dataType:'json'
                
                
                        })
                        alert("Votre poste a été pris en compte , elle sera en ligne après quelques vérifications");
                        document.location.href="my-properties.php";
    })
       
}
function Addmaisontot(a)//envoi complete des informations b pour idmaison, a pour l'event
{
    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        let filed= new FormData(this);
                        $.ajax({
                                url:'fonction/php/maison_enrgis.php',
                                type:'post',
                                processData:false,
                                contentType:false,
                                data: filed,
                                dataType:'json'
                
                
                        })
                        alert("Votre poste a été pris en compte , elle sera en ligne après quelques vérifications");
                        //document.location.href="my-properties.php";
    })
       
}
function u_update(a,b,c)// mise à jour des information de l'utilisateur
{

    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        
            let filed= new FormData(this);
                        $.ajax({
                                url:'fonction/php/user_ins.php',
                                type:'post',
                                processData:false,
                                contentType:false,
                                data: filed,
                                dataType:'json'
                
                
                        })
            $.post(//rdv
                    'fonction/php/user_ins.php', 
                       {
                    idu:$("#moi").val(),
                    nom : $("#first-name").val(),
                    prenom:$("#last-name").val(),
                    mail : $("#email-address").val(),
                    tel:$("#phone-number").val(),
                    aprop:$("#about-me").val(),
                    motd : $("#password").val(),
                    motf : $("#confirm-password").val()
                   
                    
                        },
                    function(data){
                        
                        if(data=="okokokokok"||data=="okokokokokok")
                        {
                            alert("Sauvegarde Reussi")
                        }
                        if(data=="eur1")
                        {
                            motinc("active")
                        }
                    },
                    'text'
                    ); 
        
        
    });
        $(c).click(function(){
            alert("suprrimer oh")
    });  
    
}
function  info(a)// information affiche
{
    alert(a)
    setTimeout(function(){ info(a);},5000);
}
function bloc(a)//bloquer les configurations par defaut
{
    $(a).click(function(){
        alert("il l'a touché ahahah");

    });
       
        
}
function s_update(a,b)// mise à jour des information de l'utilisateur
{

    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        })
    $(document).ready(function(){
        $(b).click(function(){
            
            $.post(//rdv
                    'fonction/php/social_ins.php', 
                       {
                    idp:$("#moi").val(),
                    facebook : $("#facebook-url").val(),
                    twitter:$("#twitter-url").val(),
                    google: $("#google-plus-url").val(),
                    linkedIn:$("#LinkedIn-url").val(),
                    instagram:$("#Instagram-url").val(),
                    printerest : $("#Pinterest-url").val()
                    
                        },
                    function(data){
                        if(data=="okokokokokok")
                        {
                            alert("Sauvegarde Reussi")
                        }
                    },
                    'text'
                    );
        
        
    });
    });
}
function supr(e)// permet de supprimer toutes les informations au niveau d'une maison
{   
       let em=$(e).attr("value");
       let verif=confirm("Ce post va être supprimé poursuivre?");
       if(verif==true)
       {
        $.post(//rdv
            'fonction/php/proprio_sup.php', 
               {
            idm:em,
            autor : "aut"
            
                },
            function(data){
                if(data=="terminer")
                {
                    alert("Suppression effectuée")
                    window.location.reload()
                }
            },
            'text'
            );
       }
      
}
function brise(e)// retire la maison comme favorie
{   
       let mais=$(e).attr("id");
       let util=$(e).attr("value");
       let verif=confirm("Cette maison sera rétiée des favories?");
       if(verif==true)
       {
        $.post(//rdv
            'fonction/php/proprio_sup.php', 
               {
            idmaison:mais,
            user: util,
            autori : "aut"
            
                },
            function(data){
                if(data=="briser")
                {
                    window.location.reload()
                }
            },
            'text'
            );
       }
      
}
function a_message(a,b)//message pour l'agent
{

    document.querySelector(a).addEventListener('submit',function(e){
        e.preventDefault()
        })
    $(document).ready(function(){
        $(b).click(function(){
            
            $.post(//rdv
                    'fonction/php/favorie.php', 
                       {
                    idp:$("#mois").val(),
                    idag: $("#agent").val(),
                    idm:$("#maison").val(),
                    mesa: $("#message").val()
                    
                        },
                    function(data){
                       
                        if(data=="envoyer")
                        {
                            alert("Message envoyé!!");
                            window.location.reload();
                        }
                    },
                    'text'
                    );
        
        
    });
    });
}
function user_photo(a)//upload de photo utilisateur
{
    
    $(document).ready(function(){
        $(a).click(function(){
            
            })
            
        
    });
    
}
