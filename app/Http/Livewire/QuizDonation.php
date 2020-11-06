<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuizDonation extends Component
{
    public $questions =  [
      ['question' => '¿Tienes más de 18 años?', 'response' => true, 'badResponse' =>'Necesitas ser mayor de edad para poder donar'],
      ['question' => '¿Estás embarazada o lactando?', 'response' => false, 'badResponse' =>'Tu salud es primero, es necesario esperar un tiempo para poder donar'],
      ['question' => '¿Traes contigo una identificación oficial con fotografía?', 'response' => true, 'badResponse' => 'Necesitas una identificación oficial para poder registrarte a la hora de donar, puede ser tu INE, Licencia o pasaporte'],
      ['question' => '¿Pesas más de 50 kilos?', 'response' => true, 'badResponse' => 'Tu peso corporal no es suficiente para que dones sangre, puesto que al hacerlo podrías sentirte mal'],
      ['question' => '¿Has padecido de ataques epilépticos, convulsiones o enfermedades del corazón?', 'response' => false, 'badResponse' => 'Tu salud es primero, habla con tu médico para saber si puedes donar'],
      ['question' => '¿Te has sometido a una operación en los últimos meses?', 'response' => false , 'badResponse' => 'Tu cirugía fue: Cirugia Mayor / Cirugia Menor i. (Consulta con tu médico si fue una cirugía mayor o menor)'],
      ['question' => '¿Te has tatuado o hecho piercings en los últimos 12 meses?', 'response' => false, 'badResponse' => 'En México es necesario esperar 12 meses para poder donar'],
      ['question' => '¿Te has vacunado en los últimos 30 días?', 'response' => false, 'badResponse' => 'Es necesario esperar 1 mes para poder donar'],
      ['question' => '¿Padeciste hepatitis después de los 10 años?', 'response' => false, 'badResponse' => 'Existe un riesgo de que puedas transmitir el virus de la hepatitis, así que es mejor no donar'],
      ['question' => '¿Tienes síntomas como tos o dolor de garganta?', 'response' => false, 'badResponse' => 'Necesitas esperar a que pasen tus síntomas para poder donar'],
      ['question' => '¿Has tomado medicamentos en los últimos 5 días?', 'response' => false, 'badResponse' => 'Consulta con tu médico si puedes donar sangre'],
    ];
    public $counter = 0;
    public $isWrongAnswer = false;
    public $isAbleToDonate = false;
    

    public function render()
    {
      return view('livewire.quiz-donation');
    }


    public function checkResponse($response){
      if($response === $this->questions[$this->counter]['response']){
        if($this->counter == 10){
          $this->isAbleToDonate = true;
        }else{
          $this->counter += 1;
        }
      }else{
        $this->isWrongAnswer = true;
      }
    }
}
