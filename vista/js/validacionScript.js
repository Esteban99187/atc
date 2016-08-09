//validaciones zora inicio
    
//inician validaciones de producto
$(document).ready(function() {
    if($('#fproducto').length>0){
        $('#fproducto').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               txtidproducto: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 1,
                            max: 6,
                            message: 'El Campo Código debe tener 1 Digito como minimo y 6 Digitos como maximo'
                        },
                        digits: {
                            message: 'Solo se permiten números'
                    
                        }
                    }
                },
                txtdesc_prod: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Debe Tener Minimo 2 Digitos y Maximo 20'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z," "]+$/,
                        message: 'Solo se permiten letras'
    					}  
                     } 
                },
                
                
    			cmbidtipo_producto: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
    			cmbidtipo_unidad: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                cmbidunidad_medida: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
               
               
                  
            }
        });
    }
});

//inician validaciones de usuario externo tipo persona
$(document).ready(function() {
    if($('#fusuarioexterno').length>0){
        $('#fusuarioexterno').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               txtidusuario: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        regexp: {
    						regexp: /^[a-zA-Z0-9]+$/i,
    						message: 'Solo se permiten letras'
    					},
    					stringLength: {
                            min: 6,
                            max: 12,
                            message: 'El Campo Código debe tener 6 Digito como minimo y 12 Digitos como maximo'
                        }
                    }
                },
                txtcedula: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 7,
                            max: 8,
                            message: 'Debe Tener Minimo 7 Digitos y Maximo 8'
                        },
                        digits: {
                            message: 'Solo se permiten numeros'
                    
                        }  
                     } 
                },
            }
        });
    }
});
//inician validaciones de usuario externo tipo empresa
$(document).ready(function() {
    if($('#fusuarioexterno_empresa').length>0){
        $('#fusuarioexterno_empresa').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               txtidusuario: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        regexp: {
    						regexp: /^[a-zA-Z0-9]+$/i,
    						message: 'Solo se permiten letras'
    					},
    					stringLength: {
                            min: 6,
                            max: 12,
                            message: 'El Nombre de Usuario debe tener 6 Digito como minimo y 12 Digitos como maximo'
                        }
                    }
                },
               txtcedula_persona: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 7,
                            max: 8,
                            message: 'Debe Tener Minimo 7 Digitos y Maximo 8'
                        },
                        digits: {
                            message: 'Solo se permiten numeros'
                    
                        }  
                     } 
                },
                txtnombre_persona: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        regexp: {
    						regexp: /^[a-zA-Z]+$/i,
    						message: 'Solo se permiten letras'
    					},
    					stringLength: {
                            min: 2,
                            max: 12,
                            message: 'Ingrese un minimo de 2 letras y maximo 12'
                        }
                    }
                },
                txtapellido_persona: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        regexp: {
    						regexp: /^[a-zA-Z]+$/i,
    						message: 'Solo se permiten letras'
    					},
    					stringLength: {
                            min: 2,
                            max: 12,
                            message: 'Ingrese un minimo de 2 letras y maximo 12'
                        }
                    }
                },
                txttelefono_persona: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 10,
                            max: 11,
                            message: 'Debe Tener Minimo 10 Digitos y Maximo 11'
                        },
                        digits: {
                            message: 'Solo se permiten numeros'
                    
                        }  
                     } 
                },
                txtcorreo_persona: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        emailAddress: {
                            message: 'Esto no es un correo'
                        }
                    }
                },
                txtcedula: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 7,
                            max: 10,
                            message: 'Debe Tener Minimo 7 Digitos y Maximo 10'
                        },
                        regexp: {
    						regexp: /^[0-9,"jvp"]+$/i,
                            message: 'formato j-999999999'
                    
                        }  
                     } 
                },
            }
        });
    }
});




//~ inician validaciones de precio

$(document).ready(function() {
    if($('#fprecio').length>0){
        $('#fprecio').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               txtidprecio: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 1,
                            max: 6,
                            message: 'El Campo Código debe tener 1 Digito como minimo y 6 Digitos como maximo'
                        },
                        digits: {
                            message: 'Solo se permiten numeros'
                    
                        }
                    }
                },
                txtprecio_pre: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 1,
                            max: 10,
                            message: 'El Campo Código debe tener 1 Digito como minimo y 10 Digitos como maximo'
                        },
                   digits: {
                            message: 'Solo se permiten numeros'
                     }  
                     } 
                },
                cmbidtipo_unidad: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                cmbidcapacidad: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                
            }
        });
    }
});
//~ inician validaciones de conductor

$(document).ready(function() {
    if($('#fconductoratc').length>0){
        $('#fconductoratc').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               txtcedula: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 7,
                            max: 8,
                            message: 'La cedula debe tener 7 a 8 digitos'
                        },
                        digits: {
                            message: 'Solo se permiten números'
                    
                        }
                    }
                },
                txtnombres_per: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Debe Tener Entre 2 y 8 Letras'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z," "]+$/,
                        message: 'Solo se permiten letras'
                     }  
                     } 
                },
                txtapellidos_per: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Debe Tener Entre 2 y 8 Letras'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z," "]+$/,
                        message: 'Solo se permiten letras'
                     }  
                     } 
                },
         			
                txttelefono_movil_per: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: 'El teléfono debe tener 11 digitos'
                        },
                        digits: {
                            message: 'Solo se permiten numeros'
                    
                        }
                    }
                },
                txttelefono_casa_per: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: 'El teléfono debe tener 11 dígitos'
                        },
                        digits: {
                            message: 'Solo se permiten números'
                    
                        }
                    }
                },
                txttelefono_corp_per: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: 'El teléfono debe tener 11 dígitos'
                        },
                        digits: {
                            message: 'Solo se permiten números'
                    
                        }
                    }
                },
                
                txtcorreo_per: {
                    validators: {
                        notEmpty: {
                            message: 'No puede estar vacio'
                        },
                        emailAddress: {
                            message: 'Esto no es un correo'
                        }
                    }
                },
                txtidestatus: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                
               txtfecha_ven_ci: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                txtfecha_ven_li: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },  
                txtfecha_ven_cermed: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                txtfecha_ven_cersal: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
                txtfecha_ven_manali: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
      	    txtobs_academica_per: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no puede estar vacio'
                        }
                    }
                },
            }
        });
    }
});
//~ inician validaciones de tipo de producto

$(document).ready(function() {
    if($('#ftipo_producto').length>0){
        $('#ftipo_producto').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               
                txtdesc_tipo_prod: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Debe Tener Minimo 2 Digitos y Maximo 20'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z," "]+$/,
                        message: 'No se permite esta letra'
                     }  
                     } 
                },
                
            }
        });
    }
});
//~ inician validaciones de cliente

$(document).ready(function() {
    if($('#fcliente').length>0){
        $('#fcliente').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               
                txtidcliente: {
                    message: 'Este valor no es valido',
                    validators: {
                        notEmpty: {
                            message: 'Este campo no debe estar vacio'
                          },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Debe Tener Minimo 2 Digitos y Maximo 20'
                        },
                    regexp: {
                        regexp: /^[a-zA-Z," "]+$/,
                        message: 'No se permite esta letra'
                     }  
                     } 
                },
                
            }
        });
    }
});
//~ inician validaciones de cliente


//~ inician validaciones de cuenta bancaria
$(document).ready(function() {
    $('#fcuenta').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidcuenta: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 20,
                        max: 20,
                        message: 'El Campo Código debe tener 20 Digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
            cmbbanco_idbanco: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbtipo_cuenta_idtipo_cuenta: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidcliente: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            
        }
    });
});
//~ inician validaciones de tipo cliente

//~ $(document).ready(function() {
    //~ $('#ftipo_cliente').bootstrapValidator({
        //~ message: 'Este valor no es valido',
        //~ feedbackIcons: {
            //~ valid: 'glyphicon glyphicon-ok',
            //~ invalid: 'glyphicon glyphicon-remove',
            //~ validating: 'glyphicon glyphicon-refresh'
        //~ },
        //~ fields: {
           //~ txtidtipo_cliente: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ stringLength: {
                        //~ min: 1,
                        //~ max: 6,
                        //~ message: 'El Campo Código debe tener 1 Digito como minimo y 6 Digitos como maximo'
                    //~ },
                    //~ digits: {
                        //~ message: 'Solo se permiten numeros'
                //~ 
                    //~ }
                //~ }
            //~ },
            //~ txtdesc_tipo_clie: {
                //~ message: 'Este valor no es valido',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no debe estar vacio'
                      //~ },
                    //~ stringLength: {
                        //~ min: 2,
                        //~ max: 20,
                        //~ message: 'Debe Tener Minimo 2 letras y Maximo 20'
                    //~ },
                //~ regexp: {
                    //~ regexp: /^[a-zA-Z," "]+$/,
                    //~ message: 'Solo se permiten letras'
                 //~ }  
                 //~ } 
            //~ },
            //~ 
        //~ }
    //~ });
//~ });


//~ inician validaciones de tipo cliente

$(document).ready(function() {
    $('#fmaestro_tipo_cliente').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtdesc_tipo_clie: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Minimo 2 letras y Maximo 20'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se permite esta letra'
                 }  
                 } 
            },
            
        }
    });
});






//fin validaciones zora

//-------MODIFICACIONES DE JESUS MANUEL "EL PUEBLO" Y JOSE TOMAS
//-------MODIFICACIONES DE JESUS MANUEL "EL PUEBLO" Y JOSE TOMAS


//~ inician validaciones MAESTRO_PRECIO_VIATICO

//~ inician validaciones maestro_roles

$(document).ready(function() {
    $('#fmaestro_roles').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtcod_rol: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
           txtnombre_rol: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },   
        }
    });
});


//~ inician validaciones maestro_departamentos

$(document).ready(function() {
    $('#fmaestro_departamento').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtiddepartamento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
           txtdesc_depa: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
            txttele_depa: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'El teléfono debe tener 11 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten números'
                
                    }
                }
            },         
        }
    });
});

//~ inician validaciones maestro_estatus

$(document).ready(function() {
    $('#fmaestro_estatus').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtnombre_est: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 20 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se permite esta letra'
                 }  
                 } 
            },
       }
    });
});


//~ inician validaciones maestro_banco

$(document).ready(function() {
    $('#fbanco').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            txtdesc_banc: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Minimo 2 letras y Maximo 20'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se permite esta letra'
                 }  
                 } 
            },
            
        }
    });
});

//~ inician validaciones maestro_unidad_medida

$(document).ready(function() {
    $('#fmaestro_unidad_medida').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          txtdesc_unid_medi: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 20 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se permite esta letra'
                 }  
                 } 
            },
   
        }
    });
});

//~ inician validaciones maestro_modelo_unidad

$(document).ready(function() {
    $('#fmaestro_modelo_unidad').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidmodelo_unidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
			txtdesc_mode: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
           txtano_mode: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
           cmbidmarca_unidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
         
        }
    });
});

//~ inician validaciones maestro_proveedor

$(document).ready(function() {
    $('#fmaestro_proveedor').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidproveedor: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
			txtnombre_pro: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
          txttelefono_pro: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'El teléfono debe tener 11 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
           txtdireccion_pro: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
 
                }
            }
       
        }
    });
});


//~ inician validaciones maestro_tipo_unidad

$(document).ready(function() {
    $('#fmaestro_tipo_unidad').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidtipo_unidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
          txtdesc_tipo_unid: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
			cmbidcapacidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
        }
    });
});

//~ inician validaciones maestro_tipo_contri

$(document).ready(function() {
    $('#fmaestro_tipo_contri').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          txtdesc_tipo_cont: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se acepta esta letra'
                 }  
                 } 
            },
        }
    });
});

//~ inician validaciones maestro_tipo_proveedor

$(document).ready(function() {
    $('#fmaestro_tipo_proveedor').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          txtdesc_tipo_prov: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'No se permite esta letra'
                 }  
                 } 
            },
        }
    });
});

//~ inician validaciones maestro_tipo_cuenta

$(document).ready(function() {
    $('#fmaestro_tipo_cuenta').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidtipo_cuenta: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
          txtdesc_tipo_cuen: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
        }
    });
});

//~ inician validaciones maestro_tipo_cliente

$(document).ready(function() {
    $('#fmaestro_tipo_cliente').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidtipo_cliente: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
          txtdesc_tipo_clie: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
        }
    });
});

//~ inician validaciones de MARIA MARCELO

//~ inician validaciones de cuenta bancaria

$(document).ready(function() {
    $('#fcuenta').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidcuenta: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 20,
                        max: 20,
                        message: 'El Campo Código debe tener 20 Digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
            cmbbanco_idbanco: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbtipo_cuenta_idtipo_cuenta: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidcliente: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            
        }
    });
});

//~ inician validaciones de la unidad de transporte

$(document).ready(function() {
    $('#funidad').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidunidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 1,
                        max: 6,
                        message: 'El Campo Código debe tener 1 Digito como minimo y 6 Digitos como maximo'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
            txtserial_motor: {
                message: 'Este valor no es valido',
                validators: {
                      stringLength: {
                        min: 15,
                        max: 20,
                        message: 'El Campo serial motor debe tener 20 Digito'
                        },
                 } 
            },
            txtserial_carroceria: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                      stringLength: {
                        min: 15,
                        max: 20,
                        message: 'El Campo serial carrocería debe tener 15 Digito como minimo y 20 Digitos como maximo '
                        },
                 } 
            },
            txtplaca: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                     stringLength: {
                        min: 7,
                        max: 7,
                        message: 'El Campo Código debe tener 7 Digitos'
                    },
                 } 
            },
            cmbidmarca_unidad: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidmodelo_unidad: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidtipo_unidad: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },            
        }
    });
});

//******************************************************Fin
//~ inician validaciones del remolque

$(document).ready(function() {
    $('#fremolque').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidremolque: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 7,
                        max: 7,
                        message: 'El Numero de placa debe tener 7 Digitos'
                    },
                }
            },
            txtserial_carroceria_rem: {
                message: 'Este valor no es valido',
                validators: {
					notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
					stringLength: {
						min: 15,
						max: 20,
						message: 'El Campo serial motor debe tener 20 Digito'
					},
                 } 
            },
            cmbidmarca_remolque: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidmodelo_remolque: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            cmbidtipo_remolque: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },            
        }
    });
});

//******************************************************Fin


//~ inician validaciones de personal

$(document).ready(function() {
    $('#fpersonaatc').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtcedula: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'La cedula debe tener 7 a 8 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten números'
                
                    }
                }
            },
            txtnombres_per: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
            txtapellidos_per: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Debe Tener Entre 2 y 8 Letras'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
            txttelefono_movil_per: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'El teléfono debe tener 11 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            },
            txttelefono_casa_per: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'El teléfono debe tener 11 dígitos'
                    },
                    digits: {
                        message: 'Solo se permiten números'
                
                    }
                }
            },
            txtcorreo_per: {
                validators: {
                    notEmpty: {
                        message: 'No puede estar vacio'
                    },
                    emailAddress: {
                        message: 'Esto no es un correo'
                    }
                }
            },
            txtdireccion_habitacion_per: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
            cmbidestatus: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
            cmbcod_rol: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
            cmbiddepartamento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },

        }
    });
});



//~ inician validaciones de Tabulador

$(document).ready(function() {
    $('#ftabulador').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           txtidtabulador: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
            txtdesc_tipo_unid: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },  
           txtcapacidad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },
            txtprecio_pre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },  
            txtprecio_total_tab: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },  
            txtidruta: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },  
            txtkilometraje_tab: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    }
                }
            },  
        }
    });
});





//~ inician validaciones de la Solicitud del cliente
//~ 
//~ $(document).ready(function() {
    //~ $('#fsolicitud').bootstrapValidator({
        //~ message: 'Este valor no es valido',
        //~ feedbackIcons: {
            //~ valid: 'glyphicon glyphicon-ok',
            //~ invalid: 'glyphicon glyphicon-remove',
            //~ validating: 'glyphicon glyphicon-refresh'
        //~ },
        //~ fields: {
           //~ txtidsolicitud: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ digits: {
                        //~ message: 'Solo se permiten números'
                //~ 
                    //~ }
                //~ }
            //~ },
            //~ txtidempresa: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ stringLength: {
                        //~ min: 7,
                        //~ max: 10,
                        //~ message: 'Rif debe tener 7 a 10 digitos'
                    //~ },
                    //~ regexp: {
						//~ regexp: /^[0-9,"jvp"]+$/i,
                        //~ message: 'formato j-999999999'
                //~ 
                    //~ }
                //~ }
            //~ },            
            //~ txtidtabulador: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ digits: {
                        //~ message: 'Solo se permiten números'
                //~ 
                    //~ }
                //~ }
            //~ },        
            //~ txtfecha_salida: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ date: {
                        //~ format: 'DD/MM/YYYY',
                        //~ message: 'Esta no es una fecha valida'
                    //~ }
                //~ }
            //~ },        
            //~ txtdireccion_salida: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                //~ }
            //~ },         
    //~ 
            //~ txtfecha_entrega: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                    //~ date: {
                        //~ format: 'DD/MM/YYYY',
                        //~ message: 'Esta no es una fecha valida'
                    //~ }
                //~ }
            //~ },         
    //~ 
            //~ txtdireccion_entrega: {
                //~ message: 'The username is not valid',
                //~ validators: {
                    //~ notEmpty: {
                        //~ message: 'Este campo no puede estar vacio'
                    //~ },
                //~ }
            //~ },         
                 //~ 
        //~ }
    //~ });
//~ });





//~ inician validaciones de la Solicitud Precesar



//~ inician validaciones MAESTRO_PRECIO_VIATICO

$(document).ready(function() {
    $('#fSistema').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           fallidos: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                digits: {
                    message: 'Solo se permiten numeros'
                 }  
                 } 
            },
            cclave: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                digits: {
                    message: 'Solo se permiten numeros'
                 }  
                 } 
            },
            preguntas: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                digits: {
                    message: 'Solo se permiten numeros'
                 }  
                 } 
            },
            tconexion: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                digits: {
                    message: 'Solo se permiten numeros'
                 }  
                 } 
            },
            mision: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            vision: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            sistema: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            }, 
            version: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            }, 
            lenguaje: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            } 
        }
    });
});
/***** VALIDA FORMULARIO DE REGISTRO DE TOPE MUNICIPIO *****/
$(document).ready(function() {
    $('#fMunicipio').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           municipio: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            }, 
        }
    });
});
/***** FIN VALIDA FORMULARIO DE REGISTRO DE Denominacion*****/

/***** VALIDA FORMULARIO DE REGISTRO DE TOPE MUNICIPIO *****/
$(document).ready(function() {
    $('#fParroquia').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           parroquia: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
             
        }
    });
});
/***** FIN VALIDA FORMULARIO DE REGISTRO DE Denominacion*****/



$(document).ready(function() {
    $('#fPerfiles').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           perfil: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                    stringLength: {
                        min: 4,
                        message: 'El nombre perfil debe tener 4 digitos minimo'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
             
        }
    });
});
$(document).ready(function() {
    $('#fbanco').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            txtdesc_banc: {
                validators: {
                    notEmpty: {
                        message: 'No puede estar vacio'
                    },
                   
                }
            },
            
             
        }
    });
});
$(document).ready(function() {
    $('#fpais').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            txtdesc_pais: {
                validators: {
                    notEmpty: {
                        message: 'No puede estar vacio'
                    },
                    regexp: {
						regexp: /^[a-zA-Z," "]+$/,
                        message: 'No se permite esta letra'
                    }
                }
            },
            
             
        }
    });
});
$(document).ready(function() {
    $('#fregion').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            txtdesc_regi: {
                validators: {
                    notEmpty: {
                        message: 'No puede estar vacio'
                    },
                    regexp: {
						regexp: /^[a-zA-Z, " "]+$/,
                        message: 'No se permite esta letra'
                    }
                }
            },
            
             
        }
    });
});
/***** FIN VALIDA FORMULARIO DE REGISTRO DE Denominacion*****/

$(document).ready(function() {
    $('#fRoles').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           nombrerol: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                regexp: {
                    regexp: /^[A-Z," "]+$/,
                    message: 'Solo se permiten letras mayusculas'
                 }  
                 } 
            },
            descripcion: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            }
             
        }
    });
});

$(document).ready(function() {
    $('#fsubmenu').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           nombre_submenu: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                regexp: {
                    regexp: /^[A-Z," "]+$/,
                    message: 'Solo se permiten letras mayusculas'
                 }  
                 } 
            },
            url_submenu: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            descripcion_submenu: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            }
             
        }
    });
});
$(document).ready(function() {
    $('#foperacion').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           NombreOperacion: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      },
                regexp: {
                    regexp: /^[A-Z," "]+$/,
                    message: 'Solo se permiten letras mayusculas'
                 }  
                 } 
            },
            UrlOperacion: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            },
            DescripcionOperacion: {
                message: 'Este valor no es valido',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                      }, 
                 } 
            }
             
        }
    });
});


$(document).ready(function() {
    $('#fUsuarios').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cedula: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'La cedula debe tener 7 y 8 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            }, 
        nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
              }  
            }, 
        apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                     },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                }
            }, 
        telefono: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                    },
                    stringLength: {
                        min: 11,
                        max: 12,
                        message: 'Numero telefonico incorrecto'
                    }
                }
            }, 
        correo: {
                validators: {
                    notEmpty: {
                        message: 'No puede estar vacio'
                    },
                    emailAddress: {
                        message: 'Esto no es un correo'
                    }
                }
            }, 
        clave: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                },
                stringLength: {
                min: 6,
                max: 8,
                message: 'La contraseña debe contener minimo 6 caracteres'
                }
            } 
        }

     }
    });
});

//~ validacion formulario miclave

$(document).ready(function() {
    $('#fmiclave').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cedula: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'La cedula debe tener 7 y 8 digitos'
                    },
                    digits: {
                        message: 'Solo se permiten numeros'
                
                    }
                }
            }, 
        nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
              }  
            }, 
        apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                     },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                }
            }, 
        Clave: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                },
                stringLength: {
                min: 8,
                max: 45,
                message: 'La contraseña debe contener minimo 8 caracteres'
                },
                regexp: {
                    regexp: /^[a-z]+$/,
                    message: 'Solo se permiten letras'
                 },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'Solo se permiten numeros'
                 } 
            } 
        },
        NuevaClave: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                },
                stringLength: {
                min: 8,
                max: 45,
                message: 'La contraseña debe contener minimo 8 caracteres'
                },
                different: {
                    field: 'Clave',
                    message: 'Ingrese una contraseña diferente a la anterior'
                }
                
            },            
        },
        RepetirClave: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede estar vacio'
                },
                stringLength: {
                min: 8,
                max: 45,
                equalTo: '#NuevaClave',
                message: 'La contraseña debe contener minimo 8 caracteres'
                },
				identical: {
                    field: 'NuevaClave',
                    message: 'La nueva contraseña no coincide'
                },
            },            
        },

     }
    });
});

/***** FIN DE VALIDACION DE REGISTRO DE USUARIO *****/

    function cancelar(pagina){
        window.location="?url="+pagina;
    }

    function cancelar333(pagina){
        window.location="?url="+pagina;
    }
/***** VALIDA FORMULARIO DE REGISTRO DE Actividad *****/
$(document).ready(function() {
    $('#fActividad').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            actividad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                    },
                regexp: {
                    regexp: /^[a-zA-Z," "]+$/,
                    message: 'Solo se permiten letras'
                 }  
                 } 
            },
            duracion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo no debe estar vacio'
                    }
                 } 
            } 
        }
    });
});
/***** FIN VALIDA FORMULARIO DE REGISTRO DE Actividad *****/

