CREATE TABLE listajogos (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(100),
    data_lancamento DATE,
    console VARCHAR(100),
    diretor VARCHAR(100),
    img VARCHAR(100),
    PRIMARY KEY (id)
);