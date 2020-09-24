select * from tbpaciente;
describe tbpaciente;

-- select de todos pacientes
select idpaciente, nome,date_format(nascimento,'%d/%m/%Y') as nascimento,sexo,email,telefone,usuario from tbpaciente order by idpaciente desc;

-- login
select nome,date_format(nascimento,'%d/%m/%Y') as nascimento, sexo, email, telefone from tbpaciente where usuario="mariana" and senha= md5('123');

-- insert convertando data
insert into tbpaciente (nome, nascimento, sexo, email, telefone,usuario,senha)
values('Minecraft',STR_TO_DATE('31-12-2018', '%d-%m-%Y'),'M','mojang@java.com','11 93331-3333','cletin',md5('123'));

insert into tbpaciente set nome="barner", nascimento=STR_TO_DATE('31-12-2018', '%d-%m-%Y'), sexo="M", email="amigoamigo", telefone="5555532", usuario="angelus", senha=md5('123');

