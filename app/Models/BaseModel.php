<?php

namespace App\Models {

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Collection;

    /**
     * @method static inRandomOrder()
     * @method static create(array|Collection $data)
     * @method static find(string|number $id)
     */
    class BaseModel extends Model
    {
        // traits
        use SoftDeletes;
        use HasFactory;
        use HasUuids;
    }
}
