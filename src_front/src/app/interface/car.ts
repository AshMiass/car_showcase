export interface Car {
    id: string;
    name: string
    year: string
    image: string,
    brand: {
      id: number,
      name: string
    },
    totalInStock: number,
    minPrice: number
}
