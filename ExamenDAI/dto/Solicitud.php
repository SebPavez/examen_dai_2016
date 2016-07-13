<?php

class Solicitud {
    private $id_solicitud;
    private $rut;
    private $nombre;
    private $Apellido_paterno;
    private $Apellido_materno;
    private $f_nacimiento;
    private $sexo;
    private $fono;
    private $e_mail;    
    private $direccion;
    private $comuna;
    private $nivel_educacional;
    private $experiencia_laboral;
    private $modalidad;
    private $curso;    
    private $fecha_solicitud;
    private $estado;
    
    function __construct($id_solicitud="", $rut="", $nombre="", $Apellido_paterno="", $Apellido_materno="", $f_nacimiento="", $sexo="", $fono="", $e_mail="", $direccion="", $comuna="", $nivel_educacional="", $experiencia_laboral="", $modalidad="", $curso="", $fecha_solicitud="", $estado="") {
        $this->id_solicitud = $id_solicitud;
        
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->Apellido_paterno = $Apellido_paterno;
        $this->Apellido_materno = $Apellido_materno;
        $this->f_nacimiento = $f_nacimiento;
        $this->sexo = $sexo;
        $this->fono = $fono;
        $this->e_mail = $e_mail;
        $this->direccion = $direccion;
        $this->comuna = $comuna;
        $this->nivel_educacional = $nivel_educacional;
        $this->experiencia_laboral = $experiencia_laboral;
        $this->modalidad = $modalidad;
        $this->curso = $curso;
        $this->fecha_solicitud = $fecha_solicitud;
        $this->estado = $estado;
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido_paterno() {
        return $this->Apellido_paterno;
    }

    function getApellido_materno() {
        return $this->Apellido_materno;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido_paterno($Apellido_paterno) {
        $this->Apellido_paterno = $Apellido_paterno;
    }

    function setApellido_materno($Apellido_materno) {
        $this->Apellido_materno = $Apellido_materno;
    }

        
    function getId_solicitud() {
        return $this->id_solicitud;
    }

    function getPostulante() {
        return $this->postulante;
    }

    function getModalidad() {
        return $this->modalidad;
    }

    function getCurso() {
        return $this->curso;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_solicitud($id_solicitud) {
        $this->id_solicitud = $id_solicitud;
    }

    function setPostulante($postulante) {
        $this->postulante = $postulante;
    }

    function setModalidad($modalidad) {
        $this->modalidad = $modalidad;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function getF_nacimiento() {
        return $this->f_nacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getFono() {
        return $this->fono;
    }

    function getE_mail() {
        return $this->e_mail;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getNivel_educacional() {
        return $this->nivel_educacional;
    }

    function getExperiencia_laboral() {
        return $this->experiencia_laboral;
    }

    function setF_nacimiento($f_nacimiento) {
        $this->f_nacimiento = $f_nacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setFono($fono) {
        $this->fono = $fono;
    }

    function setE_mail($e_mail) {
        $this->e_mail = $e_mail;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setNivel_educacional($nivel_educacional) {
        $this->nivel_educacional = $nivel_educacional;
    }

    function setExperiencia_laboral($experiencia_laboral) {
        $this->experiencia_laboral = $experiencia_laboral;
    }




}
