<?php namespace Syscover\Forms\Libraries;

/**
 * @package		Forms
 * @author		Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2014, SYSCOVER, SL.
 * @license		
 * @link		http://www.syscover.com
 * @since		Version 1.0
 * @filesource  Librarie that instance helper functions
 */

use Syscover\Forms\Models\Recipient;

class Miscellaneous
{
    /**
     *  Funtion to check news recipients
     *
     * @access  public
     * @param   \Syscover\Forms\Models\Record    $record
     * @param   \Syscover\Forms\Models\Form      $form
     * @return  void
     */
    public static function checkRecipients($record, $form)
    {
        $forwards       = $form->getForwards;
        $newRecipients  = [];
        $oldRecipients  = [];
        $recipients     = Recipient::where('record_406', $record->id_403)->where('forward_406', true)->get();

        // found new recipients
        foreach($forwards as $forward)
        {
            $matchRecipient = false;
            foreach($recipients as $recipient)
            {
                if($forward->email_402 == $recipient->email_406)
                {
                    $matchRecipient = true;
                    break;
                }
            }

            if(!$matchRecipient)
            {
                $newRecipients[] = [
                    'record_406'    => $record->id_403,
                    'forward_406'   => true,
                    'name_406'      => $forward->name_402,
                    'email_406'     => $forward->email_402,
                    'comments_406'  => $forward->comments_402,
                    'states_406'    => $forward->states_402
                ];
            }
        }

        // found recipients to delete
        foreach($recipients as $recipient)
        {
            $matchForward = false;
            foreach($forwards as $forward)
            {
                if($forward->email_402 == $recipient->email_406)
                {
                    $matchForward = true;
                    break;
                }
            }
            if(!$matchForward)
            {
                $oldRecipients[] = $recipient->id_406;
            }
        }

        if(count($newRecipients) > 0)  Recipient::insert($newRecipients);
        if(count($oldRecipients) > 0)  Recipient::whereIn('id_406', $oldRecipients)->delete();
    }
}