let products = [
    {
        name: 'UNCHARTED 4',
        price: '19.55',
        image: '../frontend/images/28402.jpg',
        filter: 'Adventure',
        linkToPage: '../frontend/uncHTML.html',
    },
    {
        name: 'Microsoft Flight Simulator 40th Anniversary Edition',
        price: '69.99',
        image: '../frontend/images/capsule_616x353.jpg',
        filter: 'Simulator',
        linkToPage: '../frontend/msfsHTML.html',
    },
    {
        name: 'Cyberpunk 2077',
        price: '23.99',
        image: '../frontend/images/cyberpunk-2077-button-fin-1594877291453.jpg',
        filter: 'RPG games',
        linkToPage: '../frontend/cyberHTML.html',
    },
    {
        name: 'Hello Neighbor',
        price: '28.99',
        image: '../frontend/images/header (1).jpg',
        filter: 'Adventure',
        linkToPage: '../frontend/neighborHTML.html',
    },
    {
        name: 'Euro Truck Simulator 2',
        price: '4.99',
        image: '../frontend/images/header (2).jpg',
        filter: 'Simulator',
        linkToPage: '../../Nikolа/Frontend/euro-truck-simulator-2.html',
    },
    {
        name: 'X-Plane 12',
        price: '58.99',
        image: '../frontend/images/header (3).jpg',
        filter: 'Simulator',
        linkToPage: '../../Nikolа/Frontend/x-plane-12.html',
    },
    {
        name: 'NBA 2K25',
        price: '69.99',
        image: '../frontend/images/header (4).jpg',
        filter: 'Sport',
        linkToPage: '../../Nikolа/Frontend/nba-2k25.html',
    },
    {
        name: 'EA SPORTS FC™ 25',
        price: '69.99',
        image: '../frontend/images/header (5).jpg',
        filter: 'Sport',
        linkToPage: '../../Nikolа/Frontend/ea-sports-fc-25.html',
    },
    {
        name: 'Portal',
        price: '9.75',
        image: '../frontend/images/header.jpg',
        filter: 'Adventure',
        linkToPage: '../../Elitsa Ognyanova Koeva/Frontend/portal.html',
    },
    {
        name: 'Gaometry Dash',
        price: '4.99',
        image: '../frontend/images/Logo_of_Geometry_Dash.png',
        filter: 'Action',
        linkToPage: '../../Elitsa Ognyanova Koeva/Frontend/geometry_dash.html',
    },
    {
        name: 'Sonic Mania',
        price: '19.99',
        image: '../frontend/images/MV5BMWJlZTRkZmEtZjA1OS00YzYwLTlhYTAtZmJjYWYxYWJhOTFjXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
        filter: 'Action',
        linkToPage: '../../Elitsa Ognyanova Koeva/Frontend/Elitsa_html2.html',
    },
    {
        name: 'Need for Speed™ Payback',
        price: '29.99',
        image: '../frontend/images/Need_for_Speed_Payback_standard_edition_cover_art.jpg',
        filter: 'Racing',
        linkToPage: '../../Elitsa Ognyanova Koeva/Frontend/need_for_speed.html',
    },
    
];


render();


function render(){
  let HTML = '';
  for(let i=0 ; i<products.length ; i++){
    let html = `
    <div class="game-card">
              <img src="${products[i].image}" alt="Game ${i}">
              <div class="game-info">
                  <h3>${products[i].name}</h3>
                  <p class="price">$${products[i].price}</p>
                  <a href="${products[i].linkToPage}"><button class="buy-btn">Buy Now</button></a>
              </div>
          </div>
    `;
    
    HTML += html;
  
  }
  document.querySelector('.games-grid').innerHTML=HTML; 
}

function filter(filter){
  let HTML = '';
  for(let i=0; i<products.length ; i++){
    if(products[i].filter===filter){
    let html = `
    <div class="game-card">
              <img src="${products[i].image}" alt="Game ${i}">
              <div class="game-info">
                  <h3>${products[i].name}</h3>
                  <p class="price">$${products[i].price}</p>
                  <a href="${products[i].linkToPage}"><button class="buy-btn">Buy Now</button></a>
              </div>
          </div>
    `;
    
    HTML += html;
  }
  }
  document.querySelector('.games-grid').innerHTML=HTML;
  document.querySelector('.section-title').innerHTML=filter;
}
