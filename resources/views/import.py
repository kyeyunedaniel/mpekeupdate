import pandas as pd
from matplotlib import pyplot as plt
from statsmodels.tsa.holtwinters import ExponentialSmoothing as HWES

#read the data file. the date column is expected to be in the mm-dd-yyyy format.
df = pd.read_csv('retail_sales_used_car_dealers_us_1992_2020.csv', header=0, infer_datetime_format=True, parse_dates=[0], index_col=[0])
df.index.freq = 'MS'

#plot the data
df.plot()
plt.show()

#split between the training and the test data sets. The last 12 periods form the test data
df_train = df.iloc[:–12]
df_test = df.iloc[–12:]

#build and train the model on the training data
model = HWES(df_train, seasonal_periods=12, trend='add', seasonal='mul')
fitted = model.fit(optimized=True, use_brute=True)

#print out the training summary
print(fitted.summary())

#create an out of sample forcast for the next 12 steps beyond the final data point in the training data set
sales_forecast = fitted.forecast(steps=12)

#plot the training data, the test data and the forecast on the same plot
fig = plt.figure()
fig.suptitle('Retail Sales of Used Cars in the US (1992-2020)')
past, = plt.plot(df_train.index, df_train, 'b.-', label='Sales History')
future, = plt.plot(df_test.index, df_test, 'r.-', label='Actual Sales')
predicted_future, = plt.plot(df_test.index, sales_forecast, 'g.-', label='Sales Forecast')
plt.legend(handles=[past, future, predicted_future])
plt.show()