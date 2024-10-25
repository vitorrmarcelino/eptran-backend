CREATE DATABASE eptran;

USE eptran;

CREATE TABLE schools (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
);

INSERT INTO schools(name) VALUES
    ("Apiscae"),
    ("Argilla Educação Infantil"),
    ("Associação de Amigos do Autista"),
    ("Associação Joinvilense Integ do Def Visual"),
    ("Associação Educacional Luterana Bom Jesus Ielusc"),
    ("Caic Professor Mariano"),
    ("Caicprof Desemb Francisco José R de Oliveira"),
    ("Cedi Portal da Alegria"),
    ("Cedup Dario Geraldo Salles Estadua"),
    ("Centro de Educação Infantil Abc da Criança"),
    ("Centro de Educação Infantil Abelhinha Dourada"),
    ("Centro de Educação Infantil Aconchego da Criança"),
    ("Centro de Educação Infantil Alegria de Viver"),
    ("Centro de Educação Infantil Algodao Doce"),
    ("Centro de Educação Infantil Amandos Finder"),
    ("Centro de Educação Infantil Amigos da Natureza"),
    ("Centro de Educação Infantil Anjinho Sapeca"),
    ("Centro de Educação Infantil Anjos da Terra"),
    ("Centro de Educação Infantil Antonio Bruhmuller"),
    ("Centro de Educação Infantil Arco Iris Zona"),
    ("Centro de Educação Infantil Arte e Sonho"),
    ("Centro de Educação Infantil Artes e Manhas e Cia"),
    ("Centro de Educação Infantil Aventuras de Criança"),
    ("Centro de Educação Infantil Bem Me Quer"),
    ("Centro de Educação Infantil Bethesda"),
    ("Centro de Educação Infantil Boa Semente"),
    ("Centro de Educação Infantil Brincar e Aprender"),
    ("Centro de Educação Infantil Cachinhos de Ouro"),
    ("Centro de Educação Infantil Cantinho da Criança"),
    ("Centro de Educação Infantil Celio Gomes de Oliveira"),
    ("Centro de Educação Infantil Cia dos Sonhos"),
    ("Centro de Educação Infantil Ciranda das Flores"),
    ("Centro de Educação Infantil Construindo Sonhos"),
    ("Centro de Educação Infantil Criarte"),
    ("Centro de Educação Infantil Deputado Pedro Paulo Hings Colin"),
    ("Centro de Educação Infantil Doce Infancia"),
    ("Centro de Educação Infantil e Ensino Fundamental Peteleko"),
    ("Centro de Educação Infantil Espaço do Parque"),
    ("Centro de Educação Infantil Espaço do Parque Prudente"),
    ("Centro de Educação Infantil Espaço Mágico"),
    ("Centro de Educação Infantil Estrela da Manha"),
    ("Centro de Educação Infantil Fadinha"),
    ("Centro de Educação Infantil Fazendo Arte"),
    ("Centro de Educação Infantil Formando Sonhos"),
    ("Centro de Educação Infantil Grilo Falante"),
    ("Centro de Educação Infantil Jardim Sofia"),
    ("Centro de Educação Infantil João e Maria"),
    ("Centro de Educação Infantil Jorge Luiz Vanderwegen"),
    ("Centro de Educação Infantil José Francisco Vieira"),
    ("Centro de Educação Infantil Justina Rosa Fachini Municipal Morro"),
    ("Centro de Educação Infantil Kairos Kids"),
    ("Centro de Educação Infantil Lejuju"),
    ("Centro de Educação Infantil Luana Cristie"),
    ("Centro de Educação Infantil Luiza Maria Veiga"),
    ("Centro de Educação Infantil Mamae Coruja"),
    ("Centro de Educação Infantil Maria Laura Cardoso Eleoterio"),
    ("Centro de Educação Infantil Maria Ofelia Guimaraes"),
    ("Centro de Educação Infantil Marilene dos Passos Santos"),
    ("Centro de Educação Infantil Meu Pequeno Mundo"),
    ("Centro de Educação Infantil Miraci Dereti"),
    ("Centro de Educação Infantil Monteiro Lobato"),
    ("Centro de Educação Infantil Mundo Colorido"),
    ("Centro de Educação Infantil Namir Alfredo Zattar"),
    ("Centro de Educação Infantil Os Pequeninos"),
    ("Centro de Educação Infantil Pedro Ivo Figueiredo de Campos"),
    ("Centro de Educação Infantil Pequeninos de Jesus"),
    ("Centro de Educação Infantil Pequeno Ceu Me"),
    ("Centro de Educação Infantil Pequenos Bambinos"),
    ("Centro de Educação Infantil Pequenos Travessos"),
    ("Centro de Educação Infantil Play No Aprender"),
    ("Centro de Educação Infantil Ponte Serrada"),
    ("Centro de Educação Infantil Portal Kids"),
    ("Centro de Educação Infantil Presentes de Deus"),
    ("Centro de Educação Infantil Presentes de Deus - Unidade Ii"),
    ("Centro de Educação Infantil Principe da Paz"),
    ("Centro de Educação Infantil Professor Felicia Cardoso Vieira"),
    ("Centro de Educação Infantil Professor Salete Konecki"),
    ("Centro de Educação Infantil Professora Alzelir Terezinha Goncalves Pacheco"),
    ("Centro de Educação Infantil Professora Debora Cristina Neves da Silva Ruiz Paloma"),
    ("Centro de Educação Infantil Professora Herondina da Silva Vieira"),
    ("Centro de Educação Infantil Professora Iraci Schmidlin"),
    ("Centro de Educação Infantil Professora Juliana de Carvalho Vieira"),
    ("Centro de Educação Infantil Professora Teresa Campregher Moreira"),
    ("Centro de Educação Infantil Recanto dos Anjos"),
    ("Centro de Educação Infantil Recanto dos Querubins"),
    ("Centro de Educação Infantil Reino da Alegria"),
    ("Centro de Educação Infantil Reino da Criança"),
    ("Centro de Educação Infantil Sigelfrid Poffo"),
    ("Centro de Educação Infantil Silvia Regina Cavalheiro"),
    ("Centro de Educação Infantil Sonho Colorido"),
    ("Centro de Educação Infantil Sorriso da Criança"),
    ("Centro de Educação Infantil Talentos"),
    ("Centro de Educação Infantil Tempo Feliz"),
    ("Centro de Educação Infantil Tia Lia"),
    ("Centro de Educação Infantil Tia Lu"),
    ("Centro de Educação Infantil Tia Sula"),
    ("Centro de Educação Infantil Tres Rosas"),
    ("Centro de Educação Infantil Turma do Puff"),
    ("Centro de Educação Infantil Turminha Doce Vida"),
    ("Centro de Educação Infantil Viceprefeito Ivan Rodrigues"),
    ("Centro de Educação Infantil Vila da Criança"),
    ("Centro de Educação Infantil Zigalu Escola"),
    ("Centro de Educação Infantil Zilda Arns Neumann"),
    ("Ceja de Joinville"),
    ("Centro Catarinense de Educação Infantil"),
    ("Centro de Ed Aldeia do Sol"),
    ("Centro de Educação Infantil Abdon da Silveira"),
    ("Centro de Educação Infantil Adhemar Garcia"),
    ("Centro de Educação Infantil Adolfo Artmann"),
    ("Centro de Educação Infantil Arte e Vida"),
    ("Centro de Educação Infantil Balão Mágico"),
    ("Centro de Educação Infantil Beija Flor"),
    ("Centro de Educação Infantil Bianca Carolina Pinheiro"),
    ("Centro de Educação Infantil Botaozinho de Rosa"),
    ("Centro de Educação Infantil Branca de Neve"),
    ("Centro de Educação Infantil Cantinho dos Sonhos"),
    ("Centro de Educação Infantil Cantinho Feliz"),
    ("Centro de Educação Infantil Caracol"),
    ("Centro de Educação Infantil Castelo Branco"),
    ("Centro de Educação Infantil Ciranda Cirandinha"),
    ("Centro de Educação Infantil Criando Sonhos"),
    ("Centro de Educação Infantil da Associação Acolher"),
    ("Centro de Educação Infantil Eccher e Budal Arins Centro de Educação Infantil Tia Sula Unidade Ii"),
    ("Centro de Educação Infantil Eliane Kruger"),
    ("Centro de Educação Infantil Espaço da Criança"),
    ("Centro de Educação Infantil Espaço Encantado"),
    ("Centro de Educação Infantil Esperanca"),
    ("Centro de Educação Infantil Espinheiros"),
    ("Centro de Educação Infantil Estacao das Cores Me"),
    ("Centro de Educação Infantil Estacao do Bebe"),
    ("Centro de Educação Infantil Estrelinha Brilhante"),
    ("Centro de Educação Infantil Fatima"),
    ("Centro de Educação Infantil Fazendinha"),
    ("Centro de Educação Infantil Filhos de Davi"),
    ("Centro de Educação Infantil Girassol"),
    ("Centro de Educação Infantil Gustavo Zietz"),
    ("Centro de Educação Infantil Itaum"),
    ("Centro de Educação Infantil Juarez Machado"),
    ("Centro de Educação Infantil Lirio do Campo"),
    ("Centro de Educação Infantil Mario Avancini"),
    ("Centro de Educação Infantil Mio Piccolo"),
    ("Centro de Educação Infantil Miosotis"),
    ("Centro de Educação Infantil Morro do Meio Municipal Morro"),
    ("Centro de Educação Infantil Mundo Azul"),
    ("Centro de Educação Infantil Odorico Fortunato"),
    ("Centro de Educação Infantil Pao de Mel"),
    ("Centro de Educação Infantil Paraiso da Criança"),
    ("Centro de Educação Infantil Parque Guarani"),
    ("Centro de Educação Infantil Pedacinho do Ceu"),
    ("Centro de Educação Infantil Pequena Sereia"),
    ("Centro de Educação Infantil Pequeno Aprendiz"),
    ("Centro de Educação Infantil Pequeno Principe"),
    ("Centro de Educação Infantil Peter Pan"),
    ("Centro de Educação Infantil Pimpolhinhos Centro de Educação Infantil Fazendo Arte 2"),
    ("Centro de Educação Infantil Professora Zelandia Thomazi Bratti"),
    ("Centro de Educação Infantil Raio de Sol"),
    ("Centro de Educação Infantil Raios de Luz"),
    ("Centro de Educação Infantil Semeando O Futuro"),
    ("Centro de Educação Infantil Semeando Para O Futuro"),
    ("Centro de Educação Infantil Sementinha"),
    ("Centro de Educação Infantil Sol Nascente"),
    ("Centro de Educação Infantil Sonho de Criança"),
    ("Centro de Educação Infantil Sonho de Criança Centro de Educação Infantil Tia Vera"),
    ("Centro de Educação Infantil Tia Vera"),
    ("Centro de Educação Infantil Ze Carioca"),
    ("Centro de Educação Professor Neide Kruger"),
    ("Centro de Ensino Grau Tecnico - Joinville - Sc"),
    ("Centro Educ Conde Modesto Leal"),
    ("Centro Educ Dia Feliz"),
    ("Centro Educacional Catolica Machado de Assis"),
    ("Centro Educacional Conexao"),
    ("Centro Educacional Mae Natureza"),
    ("Centro Educacional Micherrot"),
    ("Centro Infantil Doce Castelo"),
    ("Colégio 4ª Dimensao"),
    ("Colégio Aquarela"),
    ("Colégio Bonja Unidade I"),
    ("Colégio Bonja Unidade Iii"),
    ("Colégio Cenecista José Elias Moreira"),
    ("Colégio dos Santos Anjos"),
    ("Colégio Evangelico Pr Manoel Germano de Miranda"),
    ("Colégio Exathum"),
    ("Colégio Oficina"),
    ("Colégio Policial Militar Feliciano Nunes Pires - Unidade Osvaldo Aranha"),
    ("Colégio Positivo Joinville"),
    ("Colégio Santo Antonio"),
    ("Colégio Siloe"),
    ("Colégio UnivilleZona"),
    ("Cooperativa de Educação de Professores e Especialistas"),
    ("Creche Centro de Educação Infantil Prole Feliz Me"),
    ("Doce Mel Recreacao e Educação Infantil"),
    ("Escola Municipal Professor Rosa Maria Berezoski Demarchi"),
    ("Escola Municipal Professor Sylvio Sniecikovski"),
    ("Escola Municipal Professor Virginia Soares"),
    ("Escola Municipal Professor Saul Santanna de Oliveira Dias"),
    ("Eeb Arnaldo Moreira Douat"),
    ("Eeb Dom Pio de Freitas"),
    ("Eeb Dr Georg Keller"),
    ("Eeb Dr Jorge Lacerda"),
    ("Eeb Dr Paulo Medeiros"),
    ("Eeb Dr Tufi Dippe"),
    ("Eeb Eng Annes Gualberto"),
    ("Eeb Francisco Eberhardt"),
    ("Eeb Giovani Pasqualini Faraco"),
    ("Eeb João Colin"),
    ("Eeb Marli Maria de Souza"),
    ("Eeb Olavo Bilac"),
    ("Eeb Placido Olimpio de Oliveira"),
    ("Eeb Pres Medici"),
    ("Eeb Professor Alicia B Ferreira"),
    ("Eeb Professor Antonia Alpaides C dos Santos"),
    ("Eeb Professor Germano Timm"),
    ("Eeb Professor Gertrudes Benta"),
    ("Eeb Professor Gustavo Augusto Gonzaga"),
    ("Eeb Professor Jandira D Avila"),
    ("Eeb Professor João Martins Veras"),
    ("Eeb Professor João Rocha"),
    ("Eeb Professor Juracy Maria Brosig"),
    ("Eeb Professor Maria Amin Ghanem"),
    ("Eeb Professor Nair da Silva Pinheiro"),
    ("Eeb Professor Rudolfo Meyer"),
    ("Eeb Senador Rodrigo Lobo"),
    ("Eeb Ver Guilherme Zuege"),
    ("Eem Bailarina Liselott Trinks"),
    ("Eem Dep Nagib Zattar"),
    ("Eem Gov Celso Ramos"),
    ("Eem Governador Luiz Henrique da Silveira"),
    ("Escola Municipal Monsenhor Sebastiao Scarzello"),
    ("Escola Adventista Bom Retiro"),
    ("Escola Adventista"),
    ("Escola Agricola Municipal Carlos Heins Funke"),
    ("Escola Alfa Joinville Ei e Ef"),
    ("Escola Internacional de Joinville"),
    ("Escola Mais"),
    ("Escola Municipal Professor João Bernardino da Silveira Jr"),
    ("Escola Municipal Adolpho Bartsch"),
    ("Escola Municipal Alfredo Germano Henrique Hardt"),
    ("Escola Municipal Amador Aguiar"),
    ("Escola Municipal Anaburgo"),
    ("Escola Municipal Anita Garibaldi"),
    ("Escola Municipal Coronel Alire Carneiro"),
    ("Escola Municipal de Jovens e Adultos Cesita"),
    ("Escola Municipal de Saude Maria Carola Keller"),
    ("Escola Municipal Deputado Lauro Carneiro de Loyola"),
    ("Escola Municipal Dom Jaime de Barros Camara"),
    ("Escola Municipal Doutor Abdon Baptista"),
    ("Escola Municipal Doutor José Antonio Navarro Lins"),
    ("Escola Municipal Doutor Sadalla Amin Ghanem"),
    ("Escola Municipal Dr Hans Dieter Schmidt"),
    ("Escola Municipal Dr Ruben Roberto Schmidlin Municipal Morro"),
    ("Escola Municipal Emilio Paulo Roberto Hardt"),
    ("Escola Municipal Enfermeira Hilda Anna Krisch"),
    ("Escola Municipal Eugenio Klug"),
    ("Escola Municipal Evaldo Koehler"),
    ("Escola Municipal Fritz Benkendorf"),
    ("Escola Municipal Germano Lenschow"),
    ("Escola Municipal Governador Heriberto Hulse"),
    ("Escola Municipal Governador Pedro Ivo Campos"),
    ("Escola Municipal Hermann Muller"),
    ("Escola Municipal João"),
    ("Escola Municipal João de Oliveira"),
    ("Escola Municipal José do Patrocinio"),
    ("Escola Municipal Nelson de Miranda Coutinho"),
    ("Escola Municipal Nove de Marco"),
    ("Escola Municipal Otto Ristow Filho"),
    ("Escola Municipal Padre Valente Simioni"),
    ("Escola Municipal Pastor Hans Muller"),
    ("Escola Municipal Paul Harris"),
    ("Escola Municipal Pauline Parucker"),
    ("Escola Municipal Placido Xavier Vieira"),
    ("Escola Municipal Prefeito Baltasar Buschle"),
    ("Escola Municipal Prefeito Emilio Stock Junior"),
    ("Escola Municipal Prefeito Geraldo Wetzel"),
    ("Escola Municipal Prefeito Joaquim Felix Moreira"),
    ("Escola Municipal Prefeito Luiz Gomes"),
    ("Escola Municipal Prefeito Max Colin"),
    ("Escola Municipal Prefeito Nilson Wilson Bender"),
    ("Escola Municipal Prefeito Wittich Freitag"),
    ("Escola Municipal Pres Arthur da  e Silva"),
    ("Escola Municipal Presidente Castello Branco"),
    ("Escola Municipal Professor Ada Santanna da Silveira"),
    ("Escola Municipal Professor Edgar Monteiro Castanheira"),
    ("Escola Municipal Professor Isabel Silveira Machado"),
    ("Escola Municipal Professor Lacy Luiza da Cruz Flores"),
    ("Escola Municipal Professor Maria Magdalena Mazzolli"),
    ("Escola Municipal Professor Reinaldo Pedro de Franca"),
    ("Escola Municipal Professor Thereza Mazzolli Hreisemnou"),
    ("Escola Municipal Professor Zulma do Rosario Miranda"),
    ("Escola Municipal Professor Alfonso Fiedler Municipal Ribeirao"),
    ("Escola Municipal Professor Aluizius Sehnem"),
    ("Escola Municipal Professor Avelino Marcante"),
    ("Escola Municipal Professor Bernardo Tank"),
    ("Escola Municipal Professor Francisco Rieper"),
    ("Escola Municipal Professor Honorio Saldo"),
    ("Escola Municipal Professor João Meerholz"),
    ("Escola Municipal Professor José Motta Pires"),
    ("Escola Municipal Professor Julio Machado da Luz"),
    ("Escola Municipal Professor Orestes Guimaraes"),
    ("Escola Municipal Professor Oswaldo Cabral"),
    ("Escola Municipal Professora Anna Maria Harger"),
    ("Escola Municipal Professora Eladir Skibinski"),
    ("Escola Municipal Professora Elizabeth Von Dreifuss Municipal Morro"),
    ("Escola Municipal Professora Karin Barkemeyer"),
    ("Escola Municipal Professora Laura Andrade"),
    ("Escola Municipal Professora Maria Regina Leal"),
    ("Escola Municipal Professora Rosangela Martinowsky Baptista"),
    ("Escola Municipal Professora Senhorinha Soares"),
    ("Escola Municipal Professora Valesca May Engelmann"),
    ("Escola Municipal Senador Carlos Gomes de Oliveira"),
    ("Escola Municipal Sete de Setembro"),
    ("Escola Municipal Valentim João da Rocha"),
    ("Escola Municipal Vereador Arinor Vogelsanger"),
    ("Escola Municipal Vereador Curt Alvino Monich"),
    ("Escola Municipal Vereador Hubert Hubener"),
    ("Escola Nova Geracao"),
    ("Escola Proeza do SaberMorro"),
    ("Escola QuerubimZona"),
    ("Escola Relicario de Luz"),
    ("Escola Risos e Rabiscos"),
    ("Escola Tecnica Advance Internacional"),
    ("Escola Tecnica Tupy"),
    ("Escola Vida Nova"),
    ("Exathum Curso e Colégio"),
    ("Fundacao Pro-rim - Ipreps"),
    ("Gasp Grupo de Assistencia Social Paraiso"),
    ("Ibdi Escola de Formacao Profissional"),
    ("Ifsc - Campus Joinville"),
    ("Inst Educ Esp Profª Lia R S J de Santis"),
    ("Instituicao Adventista Sul Brasileira de Educação"),
    ("Instituto Escola do Teatro Bolshoi No Brasil"),
    ("Instituto Referencia Em Educação Integrada"),
    ("Instituto Tecnologico Assessoritec"),
    ("Jardim de Infancia Curupira"),
    ("Jardim de Infancia Leaozinho"),
    ("Senac de Joinville"),
    ("Serviço Social do Comércio"),
    ("Ud Quilombola Beco do Caminho Curto"),
    ("Uni Duni Te Jardim Escola"),
    ("Viva Educação Infantil"),
    ("Escola SESI de Referência Joinville");

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    img_url VARCHAR(255) NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    adm BOOLEAN DEFAULT FALSE,
    email VARCHAR(255) UNIQUE NOT NULL,
    gender  ENUM('M', 'F', 'O') NOT NULL,
    birthdate DATE NOT NULL,
    school_level ENUM('f1', 'f2', 'em') NULL,
    cep VARCHAR(8) NOT NULL,
    neighborhood VARCHAR(255) NULL,
    city VARCHAR(255) NOT NULL,
    school_id INT NULL,
    uf CHAR(2) NOT NULL,
    active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY(school_id) REFERENCES schools(id)
);

CREATE TABLE accesses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    access_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE game_data (
    id INT PRIMARY KEY AUTO_INCREMENT,
	update_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255) NOT NULL,
    save_data JSON NOT NULL,
	user_id INT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id)  
);

CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
	create_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    description TEXT NOT NULL,
    content TEXT NOT NULL,
    user_id INT,
    category ENUM('f1', 'f2', 'em') NULL,
    img_url VARCHAR(255) NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE saved_posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id), 
	FOREIGN KEY(post_id) REFERENCES posts(id)
);