<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Comment
 *
 * Model with properties
 * <br><b>[id, record, user, date, subject, comment]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Comment extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_404_comment';
    protected $primaryKey   = 'id_404';
    public $timestamps      = false;
    protected $fillable     = ['id_404', 'record_404', 'user_404', 'date_404', 'subject_404', 'comment_404'];
    protected $maps         = [];
    protected $relationMaps = [
        'user'      => \Syscover\Pulsar\Models\User::class,
    ];
    private static $rules   = [
        'subject'       => 'required|between:2,255'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_010_user', '004_404_comment.user_404', '=', '001_010_user.id_010');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        return $this->builder()
            ->where('record_404', $parameters['ref']);
    }

    public function customCount($request, $parameters)
    {
        return $this->builder()
            ->where('record_404', $parameters['ref']);
    }
}