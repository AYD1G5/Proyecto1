LOAD DATA LOCAL INFILE 'C:/Users/CREAL/Desktop/AYD1_SistemasPensum.csv'
INTO TABLE temporal
character set utf8mb4
FIELDS TERMINATED BY ';' 
LINES TERMINATED BY '\r\n' ignore 1 lines
(@vcodigo ,@vnombre ,@vcreditos ,@vescuela ,@varea ,@vprerequisito ,@vpostrequisitos ,@vcategoria ,@vlaboratorio ,@vrestriccion , @vsemestre)
SET
codigo = @vcodigo,
nombre = @vnombre,
creditos = @vcreditos,
escuela = @vescuela,
area = @varea,
prerequisito = @vprerequisito,
postrequisito = @vpostrequisito,
categoria = @vcategoria,
laboratorio = @vlaboratorio,
restriccion = @vrestriccion,
semestre = @vsemestre;