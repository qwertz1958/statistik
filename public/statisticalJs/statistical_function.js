// Original: https://github.com/SuperSultan/JS-Statistical-Calculator/blame/master/script.js
// Überarbeitung: Stephan Krauß

class statisticalFunction
{
	constructor(array) {
    	this.array = array;
  	}

	// Summe
	calcSum()
	{
		if (this.array.length === 0)
			return 0;

		var sum=0;

		for(var i=0; i < this.array.length; i++) {
			sum += Number(this.array[i]);	
		}
		return sum.toFixed(2);
	}

	// Minimum
	findMax()
	{
		if (this.array.length === 0) return 0;
			var max = 0;

		for(var i=0; i<this.array.length; i++) {
			if (this.array[i] > max) {
				max = this.array[i];
			}
		}

		return max.toFixed(2);
	}

	// Maximum
	findMin()
	{
		if (this.array.length === 0)
			return 0;

		var min = this.array[0];

		for(var i = 0; i < this.array.length; i++)
		{
			if (this.array[i] < min) 
				min = this.array[i];		
		}

		return min.toFixed(2);
	}

	// arithmetisher Mittelwert
	calcMeanArithmetic()
	{
		var mean = 0;

		var sum = this.calcSum();

		mean = sum / this.array.length;

		return mean.toFixed(2);
	}

	// Median
	calcMedian()
	{
		if (this.array.length === 0) 
			return 0;

		this.array.sort(function(a,b){return a-b;});

		var half = Math.floor(this.array.length / 2);

		if (this.array.length %2) 
			return this.array[half].toFixed(2);
		
		return ((this.array[half-1] + this.array[half]) / 2.0).toFixed(2);
	}

	// Modal
	calcMode()
	{
		this.array.sort();

		var freqs = {};

		for (var i=0; i<this.array.length; i++) {
			var num = this.array[i];
			freqs[num] = freqs[num] ? freqs[num] + 1 : 1;
		}
		

		const modes =  Object.keys(freqs).filter(x => {
			return freqs[x] == Math.max.apply(null,Object.values(freqs));
		});
			
		return modes.join(" ");
	}

	// Spannweite
	calcSpan()
	{
		return this.findMax() - this.findMin();
	}

	// Varianz 
	calculateVariance()
	{
		var differences = 0;

		var mean = this.calcMeanArithmetic();

		this.array.forEach(function(num) {
			differences += Math.pow((num - mean), 2)
		});

		var variance = differences / this.array.length;

		return variance.toFixed(2);
	}

	// Standardabweichung
	calculateStd()
	{
		var variance = this.calculateVariance();

		var std = Math.sqrt(variance);
		
		return std.toFixed(2);
	}
}