import numpy as np
import scipy
from scipy.fft import fft, fftfreq
# import numpy as np
import matplotlib.pyplot as plt
# from scipy.fftpack import fft, ifft
import pandas as pd

if __name__ == '__main__':
    # Import csv file
    df = pd.read_csv("basi_smoth.csv")
    print(df.head())
    # df.add(100)
    print(df)

    # plot data
    plt.figure(figsize=(12, 4))
    df.plot(linestyle='', marker='*', color='r')
    plt.show()

    # FFT
    # number of sample points
    N = 16383
    # N = 407
    # frequency of signal
    T = 0.0006
    # create x-axis for time length of signal
    x = np.linspace(0, N * T, N // 2)
    # create array that corresponds to values in signal
    y = df
    # perform FFT on signal
    yf = scipy.fft.fft(y)
    print(yf)

    # create new x-axis: frequency from signal
    xf = np.linspace(0.0, 1.0 / (2.0 * T), N // 2)
    # xf = fftfreq(N, T)[:N//2]
    # plot results
    plt.plot(xf, yf)
    plt.grid()
    plt.show()
