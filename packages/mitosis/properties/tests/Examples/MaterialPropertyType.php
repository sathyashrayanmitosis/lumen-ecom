

namespace Mitosis\Properties\Tests\Examples;

use Mitosis\Properties\Contracts\PropertyType;

class MaterialPropertyType implements PropertyType
{
    public function getName(): string
    {
        return 'material';
    }

    public function transformValue(string $value, ?array $settings)
    {
        return $value;
    }
}
