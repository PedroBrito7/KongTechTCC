const fs = require('fs');
const path = require('path');

// Caminho raiz do projeto
const projectPath = __dirname; // coloca organiza.js dentro de kongdados/

// Map de pastas de imagens gerais
const pastaMap = {
    'banners': 'assets/images/banners',
    'fotosandroid': 'assets/images/fotos-android',
    'ap': 'assets/images/ap',
    'applewatch': 'assets/images/apple-watch',
    'game': 'assets/images/game',
    'logo': 'logo-marcas',
    'aleatorias': 'assets/images/aleatorias'
};

// Marcas de produtos
const marcas = ['iphone','samsung','motorola','macbook','notebooks','xiaomi','som','tv','game','applewatch'];

// Pastas extras
const extras = ['css','js','pages','produtos'];

// Cria todas as pastas
[...Object.values(pastaMap), ...extras, ...marcas.map(m => path.join('produtos', m))].forEach(folder => {
    const full = path.join(projectPath, folder);
    if(!fs.existsSync(full)) fs.mkdirSync(full, { recursive: true });
});

// Extensões
const imagensExt = ['.png','.jpg','.jpeg','.gif','.webp'];

// Detecta pasta destino de imagem
function detectarPasta(fileName) {
    const lower = fileName.toLowerCase().replace(/\s/g,'');
    for(const key in pastaMap){
        if(lower.includes(key)) return path.join(projectPath, pastaMap[key]);
    }
    for(const marca of marcas){
        if(lower.includes(marca)) return path.join(projectPath,'produtos',marca);
    }
    return path.join(projectPath,'assets/images/aleatorias');
}

// Move arquivo (garante pasta)
function moverArquivo(origem, destino){
    const pastaDestino = path.dirname(destino);
    if(!fs.existsSync(pastaDestino)) fs.mkdirSync(pastaDestino, { recursive: true });
    if(origem !== destino) {
        console.log('Movendo:', origem, '→', destino);
        fs.renameSync(origem, destino);
    }
}

// Lê arquivos recursivamente
function lerArquivos(folder){
    let results = [];
    fs.readdirSync(folder).forEach(file=>{
        const full = path.join(folder,file);
        const stat = fs.lstatSync(full);
        if(stat.isDirectory()) results = results.concat(lerArquivos(full));
        else results.push(full);
    });
    return results;
}

// 1️⃣ Organiza imagens
function organizarImagens(allFiles){
    allFiles.forEach(file=>{
        const ext = path.extname(file).toLowerCase();
        if(imagensExt.includes(ext)){
            const nome = path.basename(file);
            const destino = path.join(detectarPasta(nome),nome);
            moverArquivo(file,destino);
        }
    });
}

// 2️⃣ Move HTML para pages/
function organizarHTML(allFiles){
    allFiles.forEach(file=>{
        if(file.endsWith('.html')){
            const nome = path.basename(file);
            const destino = path.join(projectPath,'pages',nome);
            moverArquivo(file,destino);
        }
    });
}

// 3️⃣ Atualiza caminhos em HTML e CSS
function atualizarCaminhos(allFiles){
    allFiles.forEach(file=>{
        if(!file.endsWith('.html') && !file.endsWith('.css')) return;

        let content = fs.readFileSync(file,'utf8');

        // src de imagens e js
        content = content.replace(/src="([^"]+)"/gi,(match,p1)=>{
            const nomeArquivo = path.basename(p1);
            const ext = path.extname(nomeArquivo).toLowerCase();
            let pastaDestino = '';
            if(imagensExt.includes(ext)) pastaDestino = detectarPasta(nomeArquivo);
            else if(ext === '.js') pastaDestino = path.join(projectPath,'js');
            else return match;
            const rel = path.relative(path.dirname(file),path.join(pastaDestino,nomeArquivo)).replace(/\\/g,'/');
            return `src="${rel}"`;
        });

        // href css
        content = content.replace(/href="([^"]+\.css)"/gi,(match,p1)=>{
            const nome = path.basename(p1);
            const rel = path.relative(path.dirname(file),path.join(projectPath,'css',nome)).replace(/\\/g,'/');
            return `href="${rel}"`;
        });

        // url() CSS
        content = content.replace(/url\(['"]?([^'")]+)['"]?\)/gi,(match,p1)=>{
            const nomeArquivo = path.basename(p1);
            const pastaDestino = detectarPasta(nomeArquivo);
            const rel = path.relative(path.dirname(file),path.join(pastaDestino,nomeArquivo)).replace(/\\/g,'/');
            return `url('${rel}')`;
        });

        fs.writeFileSync(file,content,'utf8');
    });
}

// Execução passo a passo
let allFiles = lerArquivos(projectPath);
organizarImagens(allFiles);

allFiles = lerArquivos(projectPath);
organizarHTML(allFiles);

allFiles = lerArquivos(projectPath);
atualizarCaminhos(allFiles);

console.log('✅ Projeto totalmente organizado! HTML em pages/, produtos em subpastas e caminhos atualizados.');
