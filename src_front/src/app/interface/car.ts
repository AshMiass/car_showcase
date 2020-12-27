export interface Car {
    id: string;
    name: string
    year: string
    brand: {
      id: number,
      name: string
    },
    totalInStock: number,
    minPrice: number
}
