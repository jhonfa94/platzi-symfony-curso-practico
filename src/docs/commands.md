## Instalar ORM pack
```
    composer require symfony/orm-pack
```

## Instalar motor de plantilla
```
   composer require symfony/twig-pack
```

## Instalar el debug
```
    composer require symfony/debug-pack --dev
```

## Instalar el maker bundle
```
    composer require symfony/maker-bundle --dev
```

## Crear base de datos
```
    php bin/console doctrine:database:create
```
La base de datos se crea con base en la configuración que se tiene en el archivo ***.env***

## Crear entidad
```
    php bin/console make:entity
```
Al momento de crear la entidad, el asistente en consola solicitara definir los nombres y tipos de campos, aparte de poder definir las relaciones.

Luego de crear las entidades, se procede a crear las migraciones, las cuales se configuran con el valor de las entidades. 


## Crear migraciones
```
    php bin/console make:migration
```
Después de crear las migraciones se procede a sincronizar estas migraciones en la base de datos.

## Migrar a la base de datos 
```
    php bin/console doctrine:migrations:migrate
```
Solicita confirmacion de la migración, lo cual se debe indicar que si. 
Con esto se configura las tablas en la base de datos. 

## Crear una relación
```
    php bin/console make:entity
```
Indicamos con la entidad, luego se debe agregar el nombre de la propiedad para la relación.
Cuando la relación se tiene de uno a muchos se recomienda que esta se deje el nombre el prural, ejemplo posts.

Luego de realizar los cambios en la creación de las relaciones, se debe crear la migración

## Crear migracion y migrar
```
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
```

## Instalar componente para la parte administrativa
```
    composer require easycorp/easyadmin-bundle
```
A través de este componente se habilitan nuevas opciones desde la consola como la creación del dashaboard y la parte del crud



## Creación del Admin Dashboard a partir del easyadmin
```
    php bin/console make:admin:dashboard
```

## Creación del primer CRUD
```
    php bin/console make:admin:crud
```
Se visualizaa el listado de entidades para indicar con cual se vaa  trabajar

## Instalar paquete para los datos semillas
```
    composer require orm-fixtures --dev
```

## Paquete del proveedor de datos falsos
```
    composer require zenstruck/foundry --dev
```

## Crear archivos factory
```
    php bin/console make:factory
```

## Comando para cargar los datos falsos
```
    php bin/console doctrine:fixtures:load
```

## Crear entidad de los usuarios
```
    php bin/console make:user
```
Este comando es el mismo relacionado con entity, pero enfocado a la entidad de usuarios

Luego de crear la entidad de usuarios, se procede a crear la migración  

## Crear migración
```
    php bin/console make:migration
```

## Ejecutar la migración en la tabla de la base de datos
```
     php bin/console doctrine:migrations:migrate
```

## Crear el sistema de autenticación
```
    php bin/console make:auth
```
Luego de ejecutar el comando en consola, se debe seleccionar la opción, para ello se determina la opción de 1, la cual es un formulario de autenticación

Después de llevar el paso a paso del asistente, se debe tener presente la redirección. 


## Crear formulario de registro de usuarios
```
    php bin/console make:registration-form
```
Para habilitar la autenticación en el aplicativo, se debe ir a config/packages/security.yaml, y de allí habilitar el access_control 


## Configuración de CRUD para usuarios
```
    php bin/console make:admin:crud
```

## Eliminar la base de datos
```
    php bin/console doctrine:database:drop --force
```
Esto solo se realiza en pruebas o de primera instancia. 


## Crear la base de datos
```
    php bin/console doctrine:database:create
```

## Ejecutar las migraciones ya creadas
```
    php bin/console doctrine:migrations:migrate
```

## Crear el factory de los usuarios 
```
    php bin/console make:factory
```
Se debe seleccionar la entidad. 

## Ejecutar los datos falsos
```
    php bin/console doctrine:fixtures:load
```


##
```
```


##
```
```


##
```
```



