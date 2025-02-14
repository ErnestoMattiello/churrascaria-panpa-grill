CREATE DATABASE IF NOT EXISTS bdchurrascarias;
USE bdchurrascarias;

CREATE TABLE usuarios (
id INT auto_increment primary key,
nome VARCHAR(120) NOT NULL,
email VARCHAR(100) NOT NULL,
senha VARCHAR(255) NOT NULL,
nivel VARCHAR(20) NOT NULL
);

insert into usuarios (nome,email,senha,nivel) values ('roberto','roberto@roberto.com','Roberto951@','admin');
select * from usuarios ;
drop table usuarios;

-- Alteração do delimitador para '//' para permitir um bloco de código SQL com múltiplas instruções
DELIMITER //

-- Criação da trigger 'senha_verifica' para garantir que a senha atenda aos requisitos antes da inserção
CREATE TRIGGER senha_verifica
BEFORE INSERT ON usuarios        -- Trigger executada antes da inserção na tabela 'adim'
FOR EACH ROW                         -- Aplica-se a cada linha que está sendo inserida
BEGIN
    -- Verifica se a nova senha contém pelo menos um número e o caractere '@'
    IF NOT (NEW.senha REGEXP '.[0-9].' AND NEW.senha REGEXP '.[@].') THEN
        SIGNAL SQLSTATE '45000'      -- Dispara um erro SQL personalizado
        SET MESSAGE_TEXT = 'A senha precisa conter pelo menos um número e o caractere @';  -- Mensagem de erro
    END IF;

    -- Verifica se a nova senha contém sequências numéricas como '123', '456', etc.
    IF NEW.senha REGEXP '123|234|345|456|567|678|789|012' THEN
        SIGNAL SQLSTATE '45000'      -- Dispara um erro SQL personalizado
        SET MESSAGE_TEXT = 'A senha não pode conter sequências numéricas como 123, 456, etc.';  -- Mensagem de erro
    END IF;

    -- Verifica se a nova senha contém pelo menos uma letra maiúscula e uma letra minúscula
    IF NOT (NEW.senha REGEXP '.[A-Z].' AND NEW.senha REGEXP '.[a-z].') THEN
        SIGNAL SQLSTATE '45000'      -- Dispara um erro SQL personalizado
        SET MESSAGE_TEXT = 'A senha precisa conter pelo menos uma letra maiúscula e uma letra minúscula';  -- Mensagem de erro
    END IF;
END//
-- Restaura o delimitador padrão para ';'
DELIMITER ;
-- -----------------------------------------------------------------------------------------------------------------------------


CREATE TABLE itens (
    id_item int NOT NULL auto_increment primary key,
    nome VARCHAR(100) NOT NULL
);
drop table itens;

INSERT INTO itens (nome) VALUES ('Espetinho de Camarão');
INSERT INTO itens (nome) VALUES ('Espetinho de Peito de Frango');
INSERT INTO itens (nome) VALUES ('Espetinho de Vegetais');
INSERT INTO itens (nome) VALUES ('Espetinho de Costela de Cordeiro');
INSERT INTO itens (nome) VALUES ('Espetinho de Alcatra');
INSERT INTO itens (nome) VALUES ('Porção de Asinha de Frango');
INSERT INTO itens (nome) VALUES ('Porção de Queijo Coalho Grelhado');
INSERT INTO itens (nome) VALUES ('Porção de Linguiça de Frango');
INSERT INTO itens (nome) VALUES ('Porção de Peito de Frango Grelhado');
INSERT INTO itens (nome) VALUES ('Porção de Salada de Maionese');
INSERT INTO itens (nome) VALUES ('Porção de Farofa de Carne');
INSERT INTO itens (nome) VALUES ('Porção de Batata Rosti com Carne');
INSERT INTO itens (nome) VALUES ('Filet Mignon Grelhado');
INSERT INTO itens (nome) VALUES ('Pato ao Molho de Laranja');
INSERT INTO itens (nome) VALUES ('Frango com Catupiry');
INSERT INTO itens (nome) VALUES ('Carne de Panela com Batatas');
INSERT INTO itens (nome) VALUES ('Chorizo Grelhado');
INSERT INTO itens (nome) VALUES ('Porção de Arroz à Grega com Legumes');
INSERT INTO itens (nome) VALUES ('Coração de Frango com Bacon');
INSERT INTO itens (nome) VALUES ('Espetinho de Abobrinha e Berinjela');
INSERT INTO itens (nome) VALUES ('Porção de Polenta Frita com Molho');
INSERT INTO itens (nome) VALUES ('Ragu de Carne com Polenta');
INSERT INTO itens (nome) VALUES ('Canelone de Carne com Molho de Tomate');
INSERT INTO itens (nome) VALUES ('Arroz de Carne com Ervas');
INSERT INTO itens (nome) VALUES ('Porção de Tutu de Feijão com Bacon');
INSERT INTO itens (nome) VALUES ('Espetinho de Picanha');
INSERT INTO itens (nome) VALUES ('Espetinho de Frango');
INSERT INTO itens (nome) VALUES ('Espetinho de Linguiça');
INSERT INTO itens (nome) VALUES ('Espetinho de Coração de Frango');
INSERT INTO itens (nome) VALUES ('Espetinho de Costela');
INSERT INTO itens (nome) VALUES ('Espetinho de Cordeiro');
INSERT INTO itens (nome) VALUES ('Porção de Frango à Passarinho');
INSERT INTO itens (nome) VALUES ('Porção de Linguiça Acebolada');
INSERT INTO itens (nome) VALUES ('Porção de Costela de Porco');
INSERT INTO itens (nome) VALUES ('Porção de Carne de Sol');
INSERT INTO itens (nome) VALUES ('Porção de Maminha Grelhada');
INSERT INTO itens (nome) VALUES ('Porção de Picanha Fatiada');
INSERT INTO itens (nome) VALUES ('Carne Moída para Churrasco');
INSERT INTO itens (nome) VALUES ('Hambúrguer de Picanha');
INSERT INTO itens (nome) VALUES ('Coxinha de Frango');
INSERT INTO itens (nome) VALUES ('Almôndega de Carne');
INSERT INTO itens (nome) VALUES ('Kafta de Cordeiro');
INSERT INTO itens (nome) VALUES ('Salsichão');
INSERT INTO itens (nome) VALUES ('Frango na Brasa');
INSERT INTO itens (nome) VALUES ('Linguado Grelhado');
INSERT INTO itens (nome) VALUES ('Tilápia à Milanesa');
INSERT INTO itens (nome) VALUES ('Porção de Batata Frita com Carne');
INSERT INTO itens (nome) VALUES ('Porção de Arroz com Carne');
INSERT INTO itens (nome) VALUES ('Bife à Parmegiana');
INSERT INTO itens (nome) VALUES ('Bife de Coração de Frango');

drop table itens;

select * from itens;
