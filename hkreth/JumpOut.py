def processData():
    N = int(raw_input().strip())
    lookup = map(int, raw_input().strip().split())
    result = 0
    for i in xrange(N):
        m = i + 1 + lookup[i]
        if m > N:
            result = i + 1
            break

    print result


processData()
