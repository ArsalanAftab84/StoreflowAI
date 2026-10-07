import StoreController from './StoreController'
import CartController from './CartController'
import AiController from './AiController'
const Controllers = {
    StoreController: Object.assign(StoreController, StoreController),
CartController: Object.assign(CartController, CartController),
AiController: Object.assign(AiController, AiController),
}

export default Controllers