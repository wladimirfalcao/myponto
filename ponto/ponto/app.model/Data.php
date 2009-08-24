<?php

include_once ("FeriadoDao.php");

abstract class Data {
    /**
     * Método getDiaSemana
     * retorna o dia da semana de uma data
     * @param DateTime $data
     * @return String
     */
    public static function getDiaSemana(DateTime $data) {
        $ds = $data->format("w");
        $dias_semana = array('Domingo', 'Segunda-Feira', 'Ter&ccedil;a-Feira',
                            'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira',
                            'S&aacute;bado');
        return $dias_semana[$ds];
    }

    /**
     * M�todo getTipoData()
     * checa se a data informada � feriado, s�bado ou domingo
     * @param DateTime $pData um objeto com a data
     * @return String "Feriado" ou o dia da semana
     */
    public static function getTipoDia(DateTime $pData)
    {
        $oFeriado = new FeriadoDao();
        $vFeriado = $oFeriado->getFeriado($pData);
        if(!$vFeriado)
        {
            return self::getDiaSemana($pData);
        }
        else
        {
            return 'Feriado';
        }
    }


    /**
     * Function to calculate date or time difference.
     *
     * Function to calculate date or time difference. Returns an array or
     * false on error.
     *
     * @author       J de Silva                             <giddomains@gmail.com>
     * @copyright    Copyright &copy; 2005, J de Silva
     * @link         http://www.gidnetwork.com/b-16.html    Get the date / time difference with PHP
     * @param        string                                 $start
     * @param        string                                 $end
     * @return       array
     */
    public static function get_time_difference( $start, $end )
    {
        $uts['start']      =    strtotime( $start );
        $uts['end']        =    strtotime( $end );
        if( $uts['start']!==-1 && $uts['end']!==-1 )
        {
            if( $uts['end'] >= $uts['start'] )
            {
                $diff    =    $uts['end'] - $uts['start'];
                if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
                if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
                if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
                $diff    =    intval( $diff );
                return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
            }
            else
            {
                trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
            }
        }
        else
        {
            trigger_error( "Invalid date/time data detected", E_USER_WARNING );
        }
        return( false );
    }


}
?>
