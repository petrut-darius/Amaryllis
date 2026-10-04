import { usePage } from '@inertiajs/vue3';
import { route as ziggyRoute } from '../../vendor/tightenco/ziggy';

export function route(name, params, absolute) {
    const { ziggy } = usePage().props;
    const config = { ...ziggy, location: new URL(ziggy.location) };
    return ziggyRoute(name, params, absolute, config);
}