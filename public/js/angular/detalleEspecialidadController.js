var app = angular.module('especialidadApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});


app.controller('detallesEspecialidadController', function($scope, $http,$window) {
    
        console.log("Controlador de Detalles");
        $scope.detalles = [];
        $scope.modalAgregarDetalle = false;
        $scope.modalEditarDetalle = false;
        $scope.modalVerDetalle = false;
        $scope.precioConDescuento = false;
        
        $scope.initDetalles = function() {
        console.log("Iniciar Detalle Especialidad");
        $scope.loading = true;
        var x1 =angular.element(document.getElementById("idDetalle"));
        var id_detalle_especialidad = x1[0].value;
        console.log(id_detalle_especialidad);
        $http.get('http://localhost:8000/api/detallesEspecialidadID/'+id_detalle_especialidad).then(function(responseDetalles){
                        $scope.detalles = responseDetalles.data;
                        console.log($scope.detalles);
                        $scope.loading = false;
                    });
        }
        
        $scope.initDetalles();
        
         
        $scope.agregarDetalle = function(){
           console.log("Agregar Detalle");
           //$scope.fecha_inicio = "";
           //$scope.fecha_fin = "";
           $scope.hora_inicio = "";
           $scope.hora_fin = "";
           $scope.precio = "";
           $scope.numero_reservas = "";
           $scope.descuento = "";
           $scope.bookeable = "";
           $scope.activo = "";
           $scope.descripcion = "";
           
           /*var date = new Date();
           $scope.fecha_inicio = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
           var date1 = new Date();
           $scope.fecha_fin = date1.getFullYear() + '-' + ('0' + (date1.getMonth() + 1)).slice(-2) + '-' + ('0' + date1.getDate()).slice(-2);*/
           
          if (confirm("Desea que sea Bookeable desde IWannaTrip?") == true) {
                $scope.modalAgregarDetalle = true;
                $scope.bookeable = true;
     
            }else{
                $scope.modalAgregarDetalle = true;
                $scope.bookeable = false;
            }
           
           
        }
        
        $scope.calculoTotal = function(precio,descuento){
            console.log(precio);
            console.log(descuento);
            var descuento1 = (precio*descuento)/100;
            $scope.totalDescuento = precio - descuento1;
            
        }
        
        $scope.guardarDetalle = function(token,id_especialidad,fecha_inicio,
        hora_inicio,fecha_fin,hora_fin,numero_reservas,precio,descuento,bookeable){
        
        var xt =angular.element(document.getElementById("token"));
        var token1 = xt[0].value;
        console.log("Valor Token1",token1);
        var nuevoToken = token1.slice(42, 82);
        console.log("Nuevo Token",nuevoToken);
        var x =angular.element(document.getElementById("id_especialidad"));
        id_especialidad = x[0].value;
        console.log(id_especialidad);
        var x1 =angular.element(document.getElementById("fecha_ini"));
        var fecha_ini = x1[0].value;
        console.log(fecha_ini);
        console.log(hora_inicio);
        var x2 =angular.element(document.getElementById("fecha_fin"));
        var fecha_fin = x2[0].value;
        console.log(fecha_fin);
        console.log(hora_fin);
        console.log(numero_reservas);
        console.log(precio);
        console.log(descuento);
        console.log("Bookeable",bookeable);
                
       $http.post('http://localhost:8000/api/detallesEspecialidad',{
            id_especialidad: id_especialidad,
            fecha_inicio: fecha_ini,
            fecha_fin: fecha_fin,
            hora_inicio: hora_inicio,
            hora_fin: hora_fin,
            numero_reservas: numero_reservas,
            precio: precio,
            descuento: descuento,
            bookeable: bookeable,
            activo: true,
            descripcion: "",
            _token: nuevoToken
        }).then(function(responseDetalleGuardar){
                if(responseDetalleGuardar.status === 200){
                    $scope.modalAgregarDetalle = false;
                    alert("El Detalle se ha Guardado Exitosamente!");
                    $scope.loading = false;
                    //$window.location.reload();
                    $scope.initDetalles();
                    
                }else{
                    alert("El detalle no se ha Guardado!");
                }
                
                
           });
        }
        
        $scope.editarDetalle = function(id){
        $scope.modalEditarDetalle = true;
        $scope.id = id;
        /*$scope.fecha_inicio = "";
        $scope.fecha_fin = "";
        $scope.hora_inicio = "";
        $scope.hora_fin = "";
        $scope.numero_reservas = "";
        $scope.descuento = "";
        $scope.bookeable = "";
        $scope.activo = "";
        $scope.descripcion = "";*/
        console.log($scope.id);
        $http.get('http://localhost:8000/api/detallesEspecialidad/'+id).then(function(responseBuscarDetalles){
                console.log(responseBuscarDetalles.data)
                $scope.id_especialidad = responseBuscarDetalles.data.id_especialidad;
                $scope.fecha_inicio = responseBuscarDetalles.data.fecha_inicio;
                $scope.fecha_fin = responseBuscarDetalles.data.fecha_fin;
                $scope.hora_inicio = responseBuscarDetalles.data.hora_inicio;
                $scope.hora_fin = responseBuscarDetalles.data.hora_fin;
                $scope.numero_reservas = responseBuscarDetalles.data.numero_reservas;
                $scope.precio = responseBuscarDetalles.data.precio;
                $scope.descuento = responseBuscarDetalles.data.descuento;
                $scope.bookeable = responseBuscarDetalles.data.bookeable;
                if($scope.bookeable === 1){
                    $scope.bookeable = true;
                }else{
                    $scope.bookeable = false;
                }
                $scope.activo = responseBuscarDetalles.data.activo;
                if($scope.activo === 1){
                    $scope.activo = true;
                }else{
                    $scope.activo = false;
                }
                $scope.descripcion = responseBuscarDetalles.data.descripcion;
                $scope.loading = false;
            });
        
        
        }
        
        $scope.actualizarDetalle = function(id,id_especialidad,fecha_inicio,hora_inicio,fecha_fin,hora_fin,
                                  numero_reservas,precio,descuento,bookeable){
        
        console.log(id);
        console.log(id_especialidad);
        var x1 =angular.element(document.getElementById("fecha_ini"));
        var fecha_ini = x1[0].value;
        console.log("Fecha Inicio",fecha_ini);
        console.log(hora_inicio);
        var x2 =angular.element(document.getElementById("fecha_fin"));
        var fecha_fin = x2[0].value;
        console.log("Fecha Fin",fecha_fin);
        console.log(hora_fin);
        console.log(numero_reservas);
        console.log(precio);
        console.log(descuento);
        console.log(bookeable);
        
        $http.put('http://localhost:8000/api/detallesEspecialidad/'+id,{
            id_especialidad: id_especialidad,
            fecha_inicio: fecha_ini,
            fecha_fin: fecha_fin,
            hora_inicio: hora_inicio,
            hora_fin: hora_fin,
            numero_reservas: numero_reservas,
            precio: precio,
            descuento: descuento,
            bookeable: bookeable
        }).then(function(responseDetalleActualizar){
                if(responseDetalleActualizar.status === 200){
                    $scope.modalEditarDetalle = false;
                    alert("El Detalle se ha Actualizado Exitosamente!");
                    $scope.loading = false;
                    $scope.initDetalles();
                }else{
                    alert("El Detalle no se ha Actualizado!");
                }
                
                
        });
        }
        
        $scope.eliminarDetalle = function(id){
        console.log("Eliminar Detalle "+ id);
            
        if (confirm("Estas Seguro?") == true) {
                $scope.loading = true;
                $http.delete('http://localhost:8000/api/detallesEspecialidad/' + id).then(function(responseDetalleEliminar){
                     if(responseDetalleEliminar.status === 200){
                         alert("El Detalle se ha Eliminado Exitosamente!");
                         $scope.loading = false;
                         $scope.initDetalles();
                     }else{
                         alert("El Detalle no se ha Eliminado!");
                     }

            });
        }else{
                console.log("No hacer nada!");
            }
        }
        
        $scope.verDetalle = function(id){
            $scope.modalVerEmpleado = true;
            $http.get('/api/empleados/'+id).then(function(responseBuscarEmpleados){
                console.log(responseBuscarEmpleados.data)
                $scope.fecha_ingreso = responseBuscarEmpleados.data.fecha_ingreso;
                $scope.documento_identidad = responseBuscarEmpleados.data.documento_identidad;
                $scope.cargo = responseBuscarEmpleados.data.cargo;
                $scope.apellidos = responseBuscarEmpleados.data.apellidos;
                $scope.nombres = responseBuscarEmpleados.data.nombres;
                $scope.telefono_principal = responseBuscarEmpleados.data.telefono_principal;
                $scope.telefono_secundario = responseBuscarEmpleados.data.telefono_secundario;
                $scope.celular = responseBuscarEmpleados.data.celular;
                $scope.direccion = responseBuscarEmpleados.data.direccion;
                $scope.email = responseBuscarEmpleados.data.email;
                $scope.foto = responseBuscarEmpleados.data.foto;
                if($scope.foto !== ""){
                    $scope.mostrarFoto = false;
                }
            	$scope.loading = false;
        });
        }
        
        $scope.cerrarNuevoDetalle = function(){
            $scope.modalAgregarDetalle = false;
        }
        
        $scope.cerrarEditarDetalle = function(){
            $scope.modalEditarDetalle = false;
        }
        
        $scope.cerrarVerDetalle = function(){
            $scope.modalVerDetalle = false;
        }
        
         
        
})

// Convert a number like 0.15 to a string like "15%"
.filter('percentage', function() {
        function percentage(number) {
            return (number * 100) + "%";
        }
        return percentage;
    })
    
.factory('focusElementById', ['$window', function($window) {
        function focusElementById(id) {
            $window.document.getElementById(id).focus();
        }
        return focusElementById;
    }])


app.directive('uploaderModel', ["$parse", function ($parse) {
	return {
		restrict: 'A',
		link: function (scope, iElement, iAttrs) 
		{
			iElement.on("change", function(e)
			{
				$parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
			});
		}
	};
}])

app.service('upload', ["$http", "$q", function ($http, $q){
	this.uploadFile = function(file, name)
	{
		var deferred = $q.defer();
		var formData = new FormData();
		formData.append("name", name);
		formData.append("file", file);
		return $http.post("server.php", formData, {
			headers: {
				"Content-type": undefined
			},
			transformRequest: angular.identity
		})
                .then(function(response){
                console.log(response);
           });
		/*.success(function(res)
		{
			deferred.resolve(res);
		})
		.error(function(msg, code)
		{
			deferred.reject(msg);
		})
		return deferred.promise;*/
	}	
}])

app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                scope.$apply(function () {
                    scope.fileread = changeEvent.target.files[0];
                    // or all selected files:
                    // scope.fileread = changeEvent.target.files;
                });
            });
        }
    }
}]);

app.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl,nombre){
        var fd = new FormData();
        fd.append('file', file);
        $http.post("upload/add", fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function(response){
            console.log(response);
        });
        

    }
}]); 
app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
app.directive('fileUpload', function () {
    return {
        scope: true,        //create a new scope
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                //iterate files since 'multiple' may be specified on the element
                for (var i = 0;i<files.length;i++) {
                    //emit event upward
                    scope.$emit("fileSelected", { file: files[i] });
                }                                       
            });
        }
    };
});

app.directive('customOnChange', function() {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var onChangeFunc = scope.$eval(attrs.customOnChange);
      element.bind('change', onChangeFunc);
    }
  };
});


