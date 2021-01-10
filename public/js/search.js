const search = document.querySelector('input[name="search"]');
const annsContainer = document.querySelector(".announcements")
//addOnClickListener()

search.addEventListener("keyup", function (event){
    if(event.key === "Enter"){
        event.preventDefault()
        const data = {search: this.value};
        fetch("/searchAction", {
            method: "POST",
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (anns){
            annsContainer.innerHTML="";
            loadAnns(anns)
        });
    }
});

function loadAnns(anns) {
    anns.forEach(ann=>{
        createAnn(ann);
    })
    //addOnClickListener()
}

function createAnn(ann){
    const template = document.querySelector("#ann-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src=`/public/upload/${ann.avatar}`;
    const username = clone.querySelector(".announcement-username");
    username.innerHTML=ann.username;
    const date = clone.querySelector(".announcement-date");
    let datestr = ann.date.split(" ");
    date.innerHTML=datestr[0];
    const time = clone.querySelector(".announcement-hour");
    time.innerHTML=datestr[1].split(".")[0];
    const gameName = clone.querySelector(".announcement-game-name");
    gameName.innerHTML=ann.game_name;
    const desc = clone.querySelector(".announcement-desc");
    desc.innerHTML=ann.description;
    const announcementDiv = clone.querySelector(".announcement");
    announcementDiv.id = ann.ann_id;

    annsContainer.appendChild(clone);
}

function addOnClickListener(){
    const announcements = document.querySelectorAll(".announcement");
    announcements.forEach(ann=>{
        ann.addEventListener("click", function (event) {
            window.location = `/ann/${ann.id}`;
        })
    })

}