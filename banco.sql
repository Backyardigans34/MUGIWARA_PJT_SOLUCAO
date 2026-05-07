USE dados_clinica;

-- Atualiza a foto do Dr. Chopper
UPDATE medicos 
SET foto_url = 'imagens/chopper.jpg' 
WHERE nome LIKE '%Chopper%';

-- Atualiza a foto do Dr. Law
UPDATE medicos 
SET foto_url = 'imagens/law.jpg' 
WHERE nome LIKE '%Law%';

-- Atualiza a foto da Dra. Tsunade
UPDATE medicos 
SET foto_url = 'imagens/tsunade.jpg' 
WHERE nome LIKE '%Tsunade%';

-- Atualiza a foto da Dra. Sakura
UPDATE medicos 
SET foto_url = 'imagens/sakura.jpg' 
WHERE nome LIKE '%Sakura%';

-- Atualiza a foto do Dr. Leorio
UPDATE medicos 
SET foto_url = 'imagens/leorio.jpg' 
WHERE nome LIKE '%Leorio%';